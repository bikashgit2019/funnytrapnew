<?php

    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    
    class WPH_module_firewall_setup extends WPH_module_component
        {
            function get_component_title()
                {
                    return "Firewall";
                }
                                    
            function get_module_component_settings()
                {
                    $this->component_settings[]                  =   array(
                                                                    'id'            =>  'firewall_query_string',
                                                                    'label'         =>  __('Query String Rules',    'wp-hide-security-enhancer'),
                                                                    'description'   =>  __('Add Firewall rules for Query String.', 'wp-hide-security-enhancer'),
                                                                    
                                                                    'help'          =>  array(
                                                                                                'title'                     =>  __('Help',    'wp-hide-security-enhancer') . ' - ' . __('Query String Rules',    'wp-hide-security-enhancer'),
                                                                                                'description'               =>  __("The query string is the portion of a URL where data is passed to a server application and/or back-end database.",    'wp-hide-security-enhancer') .
                                                                                                                                "<br /><br />" . __(" Typical URL containing a query string is as follows:",    'wp-hide-security-enhancer') .
                                                                                                                                "<br /><code>--domain--/over/there?name=ferret</code>" .
                                                                                                                                "<br /><br />"  . __("The arguments of an URL are the typical way for hackers to attempt to break into a server. This firewall gives your site a super strong layer of protection at the server level. So bad requests are blocked without having to load up PHP, MySQL, and everything else.",    'wp-hide-security-enhancer') .
                                                                                                                                "<br /></br />" .
                                                                                                                                "<br /><br />"  . __("The firewall protects against the following type of attacks:",    'wp-hide-security-enhancer') .
                                                                                                                                "<ul><li>" . __("HTTP Response Splitting",    'wp-hide-security-enhancer') . "</li>" .
                                                                                                                                    "<li>" .__("XSS) Cross-Site Scripting",    'wp-hide-security-enhancer') ."</li>" . 
                                                                                                                                    "<li>" .__("Cache Poisoning",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("Dual-Header Exploits",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("SQL/PHP/Code Injection",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("File Injection/Inclusion",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("Null Byte Injection",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("WordPress exploits such as revslider, timthumb, fckeditor, et al",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("Exploits such as c99shell, phpshell, remoteview, site copier, et al",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("PHP information leakage",    'wp-hide-security-enhancer') . "</li></ul>" .
                                                                                                                                    "<br /><span class='important'>" . __('After activating the firewall, test everything thoroughly, to ensure none of the rules breaks the site functionality.', 'wp-hide-security-enhancer') ."</span>",
                                                                                                //'option_documentation_url'  =>  'https://www.wp-hide.com/documentation/general-html-styles/'
                                                                                                ),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    );
                                                                    
                    $this->component_settings[]                  =   array(
                                                                    'id'            =>  'firewall_request_uri',
                                                                    'label'         =>  __('Request URI Rules',    'wp-hide-security-enhancer'),
                                                                    'description'   =>  __('Add Firewall rules for Request URI.', 'wp-hide-security-enhancer'),
                                                                    
                                                                    'help'          =>  array(
                                                                                                'title'                     =>  __('Help',    'wp-hide-security-enhancer') . ' - ' . __('Request URI Rules',    'wp-hide-security-enhancer'),
                                                                                                'description'               =>  __("The Request-URI is a Uniform Resource Identifier and identifies the resource upon which to apply the request. ",    'wp-hide-security-enhancer') .
                                                                                                                                "<br /><br />" . __(" Typical URI is as follows:",    'wp-hide-security-enhancer') .
                                                                                                                                "<br /><code>--domain--/over/there/</code>" .
                                                                                                                      
                                                                                                                                "<br /><br />"  . __("The firewall protects against the following type of attacks:",    'wp-hide-security-enhancer') .
                                                                                                                                "<ul><li>" . __("HTTP Response Splitting",    'wp-hide-security-enhancer') . "</li>" .
                                                                                                                                    "<li>" .__("XSS) Cross-Site Scripting",    'wp-hide-security-enhancer') ."</li>" . 
                                                                                                                                    "<li>" .__("Cache Poisoning",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("Dual-Header Exploits",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("SQL/PHP/Code Injection",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("File Injection/Inclusion",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("Null Byte Injection",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("WordPress exploits such as revslider, timthumb, fckeditor, et al",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("Exploits such as c99shell, phpshell, remoteview, site copier, et al",    'wp-hide-security-enhancer') ."</li>" .
                                                                                                                                    "<li>" .__("PHP information leakage",    'wp-hide-security-enhancer') . "</li></ul>" .
                                                                                                                                    "<br /><span class='important'>" . __('After activating the firewall, test everything thoroughly, to ensure none of the rules breaks the site functionality.', 'wp-hide-security-enhancer') ."</span>",
                                                                                               // 'option_documentation_url'  =>  'https://www.wp-hide.com/documentation/general-html-styles/'
                                                                                                ),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    );
                                                                    
                    return $this->component_settings;   
                }
                
                
                
            function _callback_saved_firewall_query_string ( $saved_field_data )
                {
                    $processing_response    =   array();
                    
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
       
                    if($this->wph->server_htaccess_config   === TRUE)                               
                        {
                            $processing_response['rewrite'] = <<<EOT
                            
# 7G FIREWALL v1.2 20190727
# @ https://perishablepress.com/7g-firewall/
  
# 7G:[QUERY STRING]
<IfModule mod_rewrite.c>

    RewriteCond %{QUERY_STRING} ([a-z0-9]{2000,}) [NC,OR]
    RewriteCond %{QUERY_STRING} (/|%2f)(:|%3a)(/|%2f) [NC,OR]
    RewriteCond %{QUERY_STRING} (/|%2f)(\*|%2a)(\*|%2a)(/|%2f) [NC,OR]
    RewriteCond %{QUERY_STRING} (~|`|<|>|\^|\|\\\\|0x00|%00|%0d%0a) [NC,OR]
    RewriteCond %{QUERY_STRING} (cmd|command)(=|%3d)(chdir|mkdir)(.*)(x20) [NC,OR]
    RewriteCond %{QUERY_STRING} (fck|ckfinder|fullclick|ckfinder|fckeditor) [NC,OR]
    RewriteCond %{QUERY_STRING} (/|%2f)((wp-)?config)((\.|%2e)inc)?((\.|%2e)php) [NC,OR]
    RewriteCond %{QUERY_STRING} (thumbs?(_editor|open)?|tim(thumbs?)?)((\.|%2e)php) [NC,OR]
    RewriteCond %{QUERY_STRING} (absolute_|base|root_)(dir|path)(=|%3d)(ftp|https?) [NC,OR]
    RewriteCond %{QUERY_STRING} (localhost|loopback|127(\.|%2e)0(\.|%2e)0(\.|%2e)1) [NC,OR]
    RewriteCond %{QUERY_STRING} (\.|20)(get|the)(_|%5f)(permalink|posts_page_url)(\(|%28) [NC,OR]
    RewriteCond %{QUERY_STRING} (s)?(ftp|http|inurl|php)(s)?(:(/|%2f|%u2215)(/|%2f|%u2215)) [NC,OR]
    RewriteCond %{QUERY_STRING} (globals|mosconfig([a-z_]{1,22})|request)(=|\[|%[a-z0-9]{0,2}) [NC,OR]
    RewriteCond %{QUERY_STRING} ((boot|win)((\.|%2e)ini)|etc(/|%2f)passwd|self(/|%2f)environ) [NC,OR]
    RewriteCond %{QUERY_STRING} (((/|%2f){3,3})|((\.|%2e){3,3})|((\.|%2e){2,2})(/|%2f|%u2215)) [NC,OR]
    RewriteCond %{QUERY_STRING} (benchmark|char|exec|fopen|function|html)(.*)(\(|%28)(.*)(\)|%29) [NC,OR]
    RewriteCond %{QUERY_STRING} (php)([0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}) [NC,OR]
    RewriteCond %{QUERY_STRING} (e|%65|%45)(v|%76|%56)(a|%61|%31)(l|%6c|%4c)(.*)(\(|%28)(.*)(\)|%29) [NC,OR]
    RewriteCond %{QUERY_STRING} (/|%2f)(=|%3d|$&|_mm|cgi(\.|-)|inurl(:|%3a)(/|%2f)|(mod|path)(=|%3d)(\.|%2e)) [NC,OR]
    RewriteCond %{QUERY_STRING} (<|%3c)(.*)(e|%65|%45)(m|%6d|%4d)(b|%62|%42)(e|%65|%45)(d|%64|%44)(.*)(>|%3e) [NC,OR]
    RewriteCond %{QUERY_STRING} (<|%3c)(.*)(i|%69|%49)(f|%66|%46)(r|%72|%52)(a|%61|%41)(m|%6d|%4d)(e|%65|%45)(.*)(>|%3e) [NC,OR]
    RewriteCond %{QUERY_STRING} (<|%3c)(.*)(o|%4f|%6f)(b|%62|%42)(j|%4a|%6a)(e|%65|%45)(c|%63|%43)(t|%74|%54)(.*)(>|%3e) [NC,OR]
    RewriteCond %{QUERY_STRING} (<|%3c)(.*)(s|%73|%53)(c|%63|%43)(r|%72|%52)(i|%69|%49)(p|%70|%50)(t|%74|%54)(.*)(>|%3e) [NC,OR]
    RewriteCond %{QUERY_STRING} (\+|%2b|%20)(d|%64|%44)(e|%65|%45)(l|%6c|%4c)(e|%65|%45)(t|%74|%54)(e|%65|%45)(\+|%2b|%20) [NC,OR]
    RewriteCond %{QUERY_STRING} (\+|%2b|%20)(i|%69|%49)(n|%6e|%4e)(s|%73|%53)(e|%65|%45)(r|%72|%52)(t|%74|%54)(\+|%2b|%20) [NC,OR]
    RewriteCond %{QUERY_STRING} (\+|%2b|%20)(s|%73|%53)(e|%65|%45)(l|%6c|%4c)(e|%65|%45)(c|%63|%43)(t|%74|%54)(\+|%2b|%20) [NC,OR]
    RewriteCond %{QUERY_STRING} (\+|%2b|%20)(u|%75|%55)(p|%70|%50)(d|%64|%44)(a|%61|%41)(t|%74|%54)(e|%65|%45)(\+|%2b|%20) [NC,OR]
    RewriteCond %{QUERY_STRING} (\\\\x00|(\"|%22|\'|%27)?0(\"|%22|\'|%27)?(=|%3d)(\"|%22|\'|%27)?0|cast(\(|%28)0x|or%201(=|%3d)1) [NC,OR]
    RewriteCond %{QUERY_STRING} (g|%67|%47)(l|%6c|%4c)(o|%6f|%4f)(b|%62|%42)(a|%61|%41)(l|%6c|%4c)(s|%73|%53)(=|[|%[0-9A-Z]{0,2}) [NC,OR]
    RewriteCond %{QUERY_STRING} (_|%5f)(r|%72|%52)(e|%65|%45)(q|%71|%51)(u|%75|%55)(e|%65|%45)(s|%73|%53)(t|%74|%54)(=|[|%[0-9A-Z]{0,2}) [NC,OR]
    RewriteCond %{QUERY_STRING} (j|%6a|%4a)(a|%61|%41)(v|%76|%56)(a|%61|%31)(s|%73|%53)(c|%63|%43)(r|%72|%52)(i|%69|%49)(p|%70|%50)(t|%74|%54)(:|%3a)(.*)(;|%3b|\)|%29) [NC,OR]
    RewriteCond %{QUERY_STRING} (b|%62|%42)(a|%61|%41)(s|%73|%53)(e|%65|%45)(6|%36)(4|%34)(_|%5f)(e|%65|%45|d|%64|%44)(e|%65|%45|n|%6e|%4e)(c|%63|%43)(o|%6f|%4f)(d|%64|%44)(e|%65|%45)(.*)(\()(.*)(\)) [NC,OR]
    RewriteCond %{QUERY_STRING} (allow_url_(fopen|include)|auto_prepend_file|blexbot|browsersploit|(c99|php)shell|curltest|disable_functions?|document_root|elastix|encodeuricom|exec|exploit|fclose|fgets|fputs|fsbuff|fsockopen|gethostbyname|grablogin|hmei7|input_file|load_file|null|open_basedir|outfile|passthru|popen|proc_open|quickbrute|remoteview|root_path|safe_mode|shell_exec|site((.){0,2})copier|sux0r|trojan|wget|xertive) [NC,OR]
    RewriteCond %{QUERY_STRING} (;|<|>|\'|\"|\)|%0a|%0d|%22|%27|%3c|%3e|%00)(.*)(/\*|alter|base64|benchmark|cast|char|concat|convert|create|encode|declare|delete|drop|insert|md5|order|request|script|select|set|union|update) [NC,OR]
    RewriteCond %{QUERY_STRING} ((\+|%2b)(concat|delete|get|select|union)(\+|%2b)) [NC,OR]
    RewriteCond %{QUERY_STRING} (union)(.*)(select)(.*)(\(|%28) [NC,OR]
    RewriteCond %{QUERY_STRING} (concat)(.*)(\(|%28) [NC]

    RewriteRule .* - [F,L]

</IfModule>
EOT;


                        }
                            
                    
                    if($this->wph->server_web_config   === TRUE)
                        {
                            //Not implemented
                        }
                    
                    if($this->wph->server_nginx_config   === TRUE)           
                        {
                            //Not Implemented
                        }
                                
                    return  $processing_response;   
                }
                
                
                
            function _callback_saved_firewall_request_uri ( $saved_field_data )
                {
                    $processing_response    =   array();
                    
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
       
                    if($this->wph->server_htaccess_config   === TRUE)                               
                        {
                            $processing_response['rewrite'] = <<<EOT
                            
# 7G FIREWALL v1.2 20190727
# @ https://perishablepress.com/7g-firewall/
  
# 7G:[REQUEST URI]
<IfModule mod_rewrite.c>
        
    RewriteCond %{REQUEST_URI} ([a-z0-9]{2000,}) [NC,OR]
    RewriteCond %{REQUEST_URI} (=?\\\\(\'|%27)/?)(\.) [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(\*|\"|\'|\.|,|&|&amp;?)/?$ [NC,OR]
    RewriteCond %{REQUEST_URI} (\.)(php)(\()?([0-9]+)(\))?(/)?$ [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(vbulletin|boards|vbforum)(/)? [NC,OR]
    RewriteCond %{REQUEST_URI} (\^|~|`|<|>|,|%|\\\\|\{|\}|\[|\]|\|) [NC,OR]
    RewriteCond %{REQUEST_URI} (\.(s?ftp-?)config|(s?ftp-?)config\.) [NC,OR]
    RewriteCond %{REQUEST_URI} (\{0\}|\"?0\"?=\"?0|\(/\(|\.\.\.|\+\+\+|\\\\\") [NC,OR]
    RewriteCond %{REQUEST_URI} (thumbs?(_editor|open)?|tim(thumbs?)?)(\.php) [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(fck|ckfinder|fullclick|ckfinder|fckeditor) [NC,OR]
    RewriteCond %{REQUEST_URI} (\.|20)(get|the)(_)(permalink|posts_page_url)(\() [NC,OR]
    RewriteCond %{REQUEST_URI} (///|\?\?|/&&|/\*(.*)\*/|/:/|\\\\\\\\|0x00|%00|%0d%0a) [NC,OR]
    RewriteCond %{REQUEST_URI} (/%7e)(root|ftp|bin|nobody|named|guest|logs|sshd)(/) [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(etc|var)(/)(hidden|secret|shadow|ninja|passwd|tmp)(/)?$ [NC,OR]
    RewriteCond %{REQUEST_URI} (s)?(ftp|http|inurl|php)(s)?(:(/|%2f|%u2215)(/|%2f|%u2215)) [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(=|\\$&?|&?(pws|rk)=0|_mm|_vti_|cgi(\.|-)?|(=|/|;|,)nt\.) [NC,OR]
    RewriteCond %{REQUEST_URI} (\.)(conf(ig)?|ds_store|htaccess|htpasswd|init?|mysql-select-db)(/)?$ [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(bin)(/)(cc|chmod|chsh|cpp|echo|id|kill|mail|nasm|perl|ping|ps|python|tclsh)(/)?$ [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(::[0-9999]|%3a%3a[0-9999]|127\.0\.0\.1|localhost|loopback|makefile|pingserver|wwwroot)(/)? [NC,OR]
    RewriteCond %{REQUEST_URI} (\(null\)|\{\\\$itemURL\}|cAsT\(0x|echo(.*)kae|etc/passwd|eval\(|self/environ|\+union\+all\+select) [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(awstats|(c99|php|web)shell|document_root|error_log|listinfo|muieblack|remoteview|site((.){0,2})copier|sqlpatch|sux0r) [NC,OR]
    RewriteCond %{REQUEST_URI} (/)((php|web)?shell|conf(ig)?|crossdomain|fileditor|locus7|nstview|php(get|remoteview|writer)|r57|remview|sshphp|storm7|webadmin)(.*)(\.|\() [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(author-panel|bitrix|class|database|(db|mysql)-?admin|filemanager|htdocs|httpdocs|https?|mailman|mailto|msoffice|mysql|_?php-?my-?admin(.*)|sql|system|tmp|undefined|usage|var|vhosts|webmaster|www)(/) [NC,OR]
    RewriteCond %{REQUEST_URI} (base64_(en|de)code|benchmark|child_terminate|e?chr|eval|exec|function|fwrite|(f|p)open|html|leak|passthru|p?fsockopen|phpinfo|posix_(kill|mkfifo|setpgid|setsid|setuid)|proc_(close|get_status|nice|open|terminate)|(shell_)?exec|system)(.*)(\()(.*)(\)) [NC,OR]
    RewriteCond %{REQUEST_URI} (\.)(7z|ab4|afm|aspx?|bash|ba?k?|bz2|cfg|cfml?|cgi|conf(ig)?|ctl|dat|db|dll|eml|et2|exe|fec|fla|hg|inc|ini|inv|jsp|log|lqd|mbf|mdb|mmw|mny|old|one|out|passwd|pdb|pl|psd|pst|ptdb|pwd|py|qbb|qdf|rar|rdf|sdb|sql|sh|soa|swf|swl|swp|stx|tar|tax|tgz|tls|tmd|wow|zlib)$ [NC,OR]
    RewriteCond %{REQUEST_URI} (/)(^$|00.temp00|0day|3xp|70bex?|admin_events|bkht|(php|web)?shell|configbak|curltest|db|dompdf|filenetworks|hmei7|index\.php/index\.php/index|jahat|kcrew|keywordspy|mobiquo|mysql|nessus|php-?info|racrew|sql|ucp|webconfig|(wp-)?conf(ig)?(uration)?|xertive)(\.php) [NC]
    
    RewriteRule .* - [F,L]
    
</IfModule>
EOT;
                        }
                            
                    
                    if($this->wph->server_web_config   === TRUE)
                        {
                            //Not implemented
                        }
                    
                    if($this->wph->server_nginx_config   === TRUE)           
                        {
                            //Not Implemented
                        }
                                
                    return  $processing_response;   
                }
 

        }
?>