<?php
//A stream wrapper provides a handler for one or more specific schemes.
//The example below shows a simple stream wrapper that sends PATCH HTTP requests when the stream is closed.
// register the FooWrapper class as a wrapper for foo:// URLs.
stream_wrapper_register("foo", FooWrapper::class, STREAM_IS_URL) or die("Duplicate stream wrapper registered");
class FooWrapper {
// this will be modified by PHP to show the context passed in the current call.
    public $context;
// this is used in this example internally to store the URL
    private $url;
// when fopen() with a protocol for this wrapper is called, this method can be implemented to store data like the host.
    public function stream_open(string $path, string $mode, int $options, string &$openedPath) : bool {
        $url = parse_url($path);
        if($url === false) return false;
        $this->url = $url["host"] . "/" . $url["path"];
        return true;
    }
// handles calls to fwrite() on this stream
    public function stream_write(string $data) : int {
        $this->buffer .= $data;
        return strlen($data);
    }
// handles calls to fclose() on this stream
    public function stream_close() {
        $curl = curl_init("http://" . $this->url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->buffer);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_exec($curl);
        curl_close($curl);
        $this->buffer = "";
    }
// fallback exception handler if an unsupported operation is attempted.
// this is not necessary.
    public function __call($name, $args) {
        throw new \RuntimeException("This wrapper does not support $name");
    }
// this is called when unlink("foo://something-else") is called.
    public function unlink(string $path) {
        $url = parse_url($path);
        $curl = curl_init("http://" . $url["host"] . "/" . $url["path"]);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_exec($curl);
        curl_close($curl);
    }
}
?>