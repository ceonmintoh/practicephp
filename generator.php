<?
function gen_one_t_three() {
    for ($i = 1; $i <= 3; $i++) {
    // Note that $i is preserved between yields.
    yield $i;
    }
}
function gen_one_to_three() {
    $keys = ["first", "second", "third"];
    for ($i = 1; $i <= 3; $i++) {
    // Note that $i is preserved between yields.
        yield $keys[$i - 1] => $i;
    }
}
    foreach (gen_one_to_three() as $key => $value) {
        echo "$key: $value\n";
    }

//   Reading a large file with a generator

class CsvReader{
    protected $file;
    public function __construct($filePath) {
        $this->file = fopen($filePath, 'r');
    }
    public function rows(){
        while (!feof($this->file)) {
            $row = fgetcsv($this->file, 4096);
            yield $row;
        }
        return;
    }
}
$csv = new CsvReader('/path/file.csv');
foreach ($csv->rows() as $row) {
    // Do something with the CSV row.
}
?>