<?php
class NgramConverter{
	function NgramConverter(){
		
	}

	function _to_ngram_fulltext($string,$n){
		if (!$n) {
			$n = 4;
		}
		$ngrams = array();
		$string = trim($string);
		if ($string == ''){
			return '';
		}
		
		$length = mb_strlen($string,'UTF-8') ;
		for ($i = 0; $i < $length; $i++) {
			$ngram = mb_substr($string, $i, $n,'UTF-8');
			$ngrams[] = $ngram;
		}
	
		return join(' ',$ngrams);
	}
	
	function _to_ngram_query($string,$n){
		if (!$n) {
			$n = 4;
		}
//		$reader =& db_get_instance('main_reader', true);
		$ngrams = array();
		$string = trim($string);
		if ($string == ''){
			return '';
		}
		$length = mb_strlen($string,'UTF-8') ;
		if ($length < $n){
//			return "+".mysql_real_escape_string($string, $reader->db->connection)."*";
			return "+".mysql_escape_string($string)."*";
		}

		for ($i = 0; $i < $length-$n+1; $i++) {
			$ngram = mb_substr($string, $i, $n,'UTF-8');
//			$ngrams[] = "+" . mysql_real_escape_string($ngram, $reader->db->connection);
			$ngrams[] = "+" . mysql_escape_string($ngram);
		}
	
		return join(' ',$ngrams);
	}
	
	function _to_ngram($string,$n,$query_flag=FALSE){
		if (!$n) {
			$n = 4;
		}
		$temp_encoding = mb_regex_encoding();
//		mb_regex_encoding('UTF-8');
//		$string = mb_ereg_replace("^(\s|　)+","",$string);
//		$string = mb_ereg_replace("(\s|　)+$","",$string);
//		$str_array = preg_split("/(\s|　)+/",$string);
//		$str_array[] = mb_eregi_replace("[ |\[|\]|\(|\)|\||　|、|。|，|．|・|：|；|？|！|゛|゜|´|｀|¨|＾|￣|＿|ヽ|ヾ|ゝ|ゞ|〃|仝|々|〆|〇|ー|―|‐|／|＼|～|∥|｜|…|‥|‘|’|“|”|（|）|〔|〕|［|］|｛|｝|〈|〉|《|》|「|」|『|』|【|】|＋|－|±|×|÷|＝|≠|＜|＞|≦|≧|∞|∴|♂|♀|°|′|″|℃|￥|＄|￠|￡|％|＃|＆|＊|＠|§|☆|★|○|●|◎|◇]", "", $string);
//		mb_regex_encoding($temp_encoding);

		if ($query_flag){
			mb_regex_encoding('UTF-8');
			$string = mb_ereg_replace("^(\s|　)+","",$string);
			$string = mb_ereg_replace("(\s|　)+$","",$string);
			$str_array = preg_split("/(\s|　)+/",$string);
			mb_regex_encoding($temp_encoding);
		} else {
			mb_regex_encoding('UTF-8');
//			$str_array[] = mb_eregi_replace("[ |\[|\]|\(|\)|\||　|、|。|，|．|・|：|；|？|！|゛|゜|´|｀|¨|＾|￣|＿|ヽ|ヾ|ゝ|ゞ|〃|仝|々|〆|〇|ー|―|‐|／|＼|～|∥|｜|…|‥|‘|’|“|”|（|）|〔|〕|［|］|｛|｝|〈|〉|《|》|「|」|『|』|【|】|＋|－|±|×|÷|＝|≠|＜|＞|≦|≧|∞|∴|♂|♀|°|′|″|℃|￥|＄|￠|￡|％|＃|＆|＊|＠|§|☆|★|○|●|◎|◇]", "", $string);
			$str_array[] = mb_eregi_replace("[ |\[|\]|\(|\)|\||　|、|。|，|．|・|：|；|？|！|゛|゜|´|｀|¨|＾|￣|＿|ヽ|ヾ|ゝ|ゞ|〃|仝|々|〆|〇|―|‐|／|＼|～|∥|｜|…|‥|‘|’|“|”|（|）|〔|〕|［|］|｛|｝|〈|〉|《|》|「|」|『|』|【|】|＋|－|±|×|÷|＝|≠|＜|＞|≦|≧|∞|∴|♂|♀|°|′|″|℃|￥|＄|￠|￡|％|＃|＆|＊|＠|§|☆|★|○|●|◎|◇]", "", $string);
			mb_regex_encoding($temp_encoding);
		}
		$result = array();
		foreach ($str_array as $str){
			if ($query_flag){
				$result[] = $this->_to_ngram_query($str,$n);
			}else{
				$result[] = $this->_to_ngram_fulltext($str,$n);
			}
		}
		return join(' ',$result);
	}
	
	function to_fulltext($string,$n){
		if (!$n) {
			$n = 4;
		}
		return $this->_to_ngram($string,$n);
	}
	
	function to_query($string,$n){
		if (!$n) {
			$n = 4;
		}
		return $this->_to_ngram($string,$n,TRUE);
	}

	function make_match_sql($word,$column,$n){
		if (!$n) {
			$n = 4;
		}
		if($word == ''){
			return '';
		}
		$ngram = $this->to_query($word,$n);
		return "MATCH(".$column.") AGAINST('".$ngram."' IN BOOLEAN MODE)";
	}
}
