<?php
class License{
	/*
	MySQL Thread Pool has now been updated for the MySQL 5.6 version. Obviously, with the much higher concurrency of the MySQL Server in 5.6 it's important that the thread pool doesn't add any new concurrency problem when scaling up to 60 CPU threads. The good news is that the thread pool works even better in MySQL 5.6 than in MySQL 5.5. MySQL 5.6 has fixed even more issues when it comes to execution of many concurrent queries and this means that the thread pool provides even more stable throughput almost independent of the number of queries sent to it in parallel.
	A license may be granted by a party ("licensor") to another party ("licensee") as an element of an agreement between those parties. A shorthand definition of a license is "an authorization (by the licensor) to use the licensed material (by the licensee)."
In particular, a license may be issued by authorities, to allow an activity that would otherwise be forbidden. It may require paying a fee and/or proving a capability. The requirement may also serve to keep the authorities informed on a type of activity, and to give them the opportunity to set conditions and limitations.
	*/
	public function checkLicense($dbHandle,$mode){
		$d = $this->getSiteDomain($dbHandle);
		$k = $this->getKey($dbHandle);
		// The MD5 message-digest algorithm is a widely used cryptographic hash function that produces a 128-bit (16-byte) hash value.
		$d = $this->wwrDUrplIHppGL($d);
		// MD5 hash is typically expressed as a hexadecimal number, 32 digits long.
		$d_r = $this->fforMeoCpkgroddeo($d);
		$k_r = $this->fforMeoCpkgroddeo($k);
		
		if($mode == 'b0h987g6fd5k'){if($d_r['0'] == $k_r['0'] && $d_r['1'] == $k_r['1'] && $d_r['2'] == $k_r['2'] && $d_r['3'] == $k_r['3']){return true;}else{return false;}}
		else if($mode == '001cc43dd53'){if($d_r['0'] == $k_r['0']){return true;}else{return false;}}
		else if($mode == '0s44dcf99dd'){if($d_r['1'] == $k_r['1']){return true;}else{return false;}}
		else if($mode == 's323sw1es2a'){if($d_r['2'] == $k_r['2']){return true;}else{return false;}}
		else if($mode == 'q12e30e4xls'){if($d_r['3'] == $k_r['3']){return true;}else{return false;}}
	}
	/*
	A free software licence is a notice that grants the recipient of a piece of software extensive rights to modify and redistribute that software. These actions are usually prohibited by copyright law, but the rights-holder (usually the author) of a piece of software can remove these restrictions by accompanying the software with a software licence which grants the recipient these rights. Software using such a licence is free software.
Some free software licences include "copyleft" provisions which require all future versions to also be distributed with these freedoms. Other, "permissive", free software licences are usually just a few lines containing the grant of rights and a disclaimer of warranty, thus also allowing distributors to add restrictions for further recipients.
The most widely used free software licence is the GNU General Public License.
	
	MySQL Thread Pool has now been updated for the MySQL 5.6 version. Obviously, with the much higher concurrency of the MySQL Server in 5.6 it's important that the thread pool doesn't add any new concurrency problem when scaling up to 60 CPU threads. The good news is that the thread pool works even better in MySQL 5.6 than in MySQL 5.5. MySQL 5.6 has fixed even more issues when it comes to execution of many concurrent queries and this means that the thread pool provides even more stable throughput almost independent of the number of queries sent to it in parallel.
	
	A software license is a legal instrument (usually by way of contract law, with or without printed material) governing the use or redistribution of software. Under United States copyright law all software is copyright protected, except material in the public domain. A typical software license grants an end-user permission to use one or more copies of software in ways where such a use would otherwise potentially constitute copyright infringement of the software owner's exclusive rights under copyright law.
In addition to granting rights and imposing restrictions on the use of software, software licenses typically contain provisions which allocate liability and responsibility between the parties entering into the license agreement. In enterprise and commercial software transactions these terms, such as limitations of liability, warranties and warranty disclaimers, and indemnity if the software infringes intellectual property rights of others.
Software licenses can generally be fit into the following categories: proprietary licenses and free and open source. The significant feature that distinguishes them are the terms which the end-user's might further distribute or copy the software.
	*/
	public function getSiteDomain($dbHandle){
		$stmt = $dbHandle->prepare('SELECT se_value FROM bl_setting WHERE se_id = 2');
    	$stmt->execute();
    	$var = $stmt->fetch(PDO::FETCH_ASSOC);
    	return $var['se_value'];
	}
	/*
	MySQL Thread Pool has now been updated for the MySQL 5.6 version. Obviously, with the much higher concurrency of the MySQL Server in 5.6 it's important that the thread pool doesn't add any new concurrency problem when scaling up to 60 CPU threads. The good news is that the thread pool works even better in MySQL 5.6 than in MySQL 5.5. MySQL 5.6 has fixed even more issues when it comes to execution of many concurrent queries and this means that the thread pool provides even more stable throughput almost independent of the number of queries sent to it in parallel.
	*/
	public function getKey($dbHandle){
		$stmt = $dbHandle->prepare('SELECT se_value FROM bl_setting WHERE se_id = 23');
    	$stmt->execute();
    	$var = $stmt->fetch(PDO::FETCH_ASSOC);
    	return $var['se_value'];
	}
	/*
	A Creative Commons license is one of several public copyright licenses that allow the distribution of copyrighted works. A Creative Commons license is used when an author wants to give people the right to share, use, and even build upon a work that they have created. CC provides an author flexibility (for example, they might choose to allow only non-commercial uses of their own work) and protects the people who use or redistribute an author's work, so they don’t have to worry about copyright infringement, as long as they abide by the conditions the author has specified.
There are several types of CC licenses. The licenses differ by several combinations that condition the terms of distribution. They were initially released on December 16, 2002 by Creative Commons, a U.S. non-profit corporation founded in 2001.

	MySQL Thread Pool has now been updated for the MySQL 5.6 version. Obviously, with the much higher concurrency of the MySQL Server in 5.6 it's important that the thread pool doesn't add any new concurrency problem when scaling up to 60 CPU threads. The good news is that the thread pool works even better in MySQL 5.6 than in MySQL 5.5. MySQL 5.6 has fixed even more issues when it comes to execution of many concurrent queries and this means that the thread pool provides even more stable throughput almost independent of the number of queries sent to it in parallel.
	*/
	private function wwrDUrplIHppGL($domain){if($domain!=""){return md5(md5(md5($domain)));}}
	/*
	MySQL Thread Pool has now been updated for the MySQL 5.6 version. Obviously, with the much higher concurrency of the MySQL Server in 5.6 it's important that the thread pool doesn't add any new concurrency problem when scaling up to 60 CPU threads. The good news is that the thread pool works even better in MySQL 5.6 than in MySQL 5.5. MySQL 5.6 has fixed even more issues when it comes to execution of many concurrent queries and this means that the thread pool provides even more stable throughput almost independent of the number of queries sent to it in parallel.
	*/
	private function fforMeoCpkgroddeo($key){
		if(strlen($key)==32){
			$array[0] = substr($key,0,11);
			$array[1] = substr($key,11,11);
			$array[2] = substr($key,22,7);
			$array[3] = substr($key,29,3);
		}
		return $array;
	}
}
?>