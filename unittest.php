<?
class LoginForm {
    public $email;
    public $rememberMe;
    public $password;
    /* rules() method returns an array with what each field has as a requirement.
    * Login form uses email and password to authenticate user.
    */
    public function rules() {
        return [
        // Email and Password are both required
        [['email', 'password'], 'required'],
        // Email must be in email format
        ['email', 'email'],
        // rememberMe must be a boolean value
        ['rememberMe', 'boolean'],
        // Password must match this pattern (must contain only letters and numbers)
        ['password', 'match', 'pattern' => '/^[a-z0-9]+$/i'],
        ];
    }
    /** the validate function checks for correctness of the passed rules */
    public function validate($rule) {
        $success = true;
        list($var, $type) = $rule;
            foreach ((array) $var as $var) {
                switch ($type) {
                    case "required":
                        $success = $success && $this->$var != "";
                        break;
                    case "email":
                        $success = $success && filter_var($this->$var, FILTER_VALIDATE_EMAIL);
                        break;
                    case "boolean":
                        $success = $success && filter_var($this->$var, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null;
                        break;
                    case "match":
                        $success = $success && preg_match($rule["pattern"], $this->$var);
                        break;
                    default:
                        throw new \InvalidArgumentException("Invalid filter type passed");
                }
            }
        return $success;
    }
}
class LoginFormTest extends TestCase {
        protected $loginForm;
        // Executing code on the start of the test
        public function setUp() {
        $this->loginForm = new LoginForm;
        }
        // To validate our rules, we should use the validate() method
        /**
        * This method belongs to Unit test class LoginFormTest and
        * it's testing rules that are described above.
        */
        public function testRuleValidation() {
        $rules = $this->loginForm->rules();
        // Initialize to valid and test this
        $this->loginForm->email = "valid@email.com";
        $this->loginForm->password = "password";
        $this->loginForm->rememberMe = true;
        $this->assertTrue($this->loginForm->validate($rules), "Should be valid as nothing is
        invalid");
        // Test email validation
        // Since we made email to be in email format, it cannot be empty
        $this->loginForm->email = '';
        $this->assertFalse($this->loginForm->validate($rules), "Email should not be valid
        (empty)");
        // It does not contain "@" in string so it's invalid
        $this->loginForm->email = 'invalid.email.com';
        $this->assertFalse($this->loginForm->validate($rules), "Email should not be valid (invalid
        format)");
        // Revert email to valid for next test
        $this->loginForm->email = 'valid@email.com';
        // Test password validation
        // Password cannot be empty (since it's required)
        $this->loginForm->password = '';
        $this->assertFalse($this->loginForm->validate($rules), "Password should not be valid
        (empty)");
        // Revert password to valid for next test
        $this->loginForm->password = 'ThisIsMyPassword';
        // Test rememberMe validation
        $this->loginForm->rememberMe = 999;
        $this->assertFalse($this->loginForm->validate($rules), "RememberMe should not be valid
        (integer type)");
        // Revert remeberMe to valid for next test
        $this->loginForm->rememberMe = true;
        }
        } 
?>