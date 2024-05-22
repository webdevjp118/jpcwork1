<?php
/*
 * �f�[�^�x�[�X�A�N�Z�X�A�֘A����
 */
require_once("my_db.php");

static $inst = null;

class DbAccess {
	var $page;		// �擾�y�[�W
	var $limit;		// �擾����
	var $order;		// �擾����
//	var $inst;		// �f�[�^�x�[�X�C���X�^���X
	var $search;	// ��������
	var $table_name;
	var $table_key;
	var $join;
    /**
     * @desc �R���X�g���N�^
     */
    function DbAccess($page, $limit, $order, $search, $name, $key) {
		global $DB_URI;
		// ��������
		$this->page = $page;
		$this->limit = $limit;
		$this->order = $order;
		$this->search = $search;
	//	$this->inst = DBConnection::getConnection($DB_URI);
		$this->table_name = $name;
		$this->table_key = $key;
		$this->join = array();
		if (!$inst) {
			$inst = DBConnection::getConnection($DB_URI);
		}
    }

	/**
	 * @name getCount
	 * @desc �����ɍ��v����f�[�^�����𓾂�
	 * @return ����
	 **/
	function getCount() {
		global $DB_URI;
		if (!$inst) {
			$inst = DBConnection::getConnection($DB_URI);
		}
		if ($inst) {
			if ($this->join) {
				array_unshift($this->join, array("table" => $this->table_name));
				$ret = $inst->count_data($this->join, $this->search);
			} else {
				$ret = $inst->count_data($this->table_name, $this->search);
			}
			if ($ret["error"] != 1) {
				return $ret["count"];
			}
		}
		return 0;
	}
	/**
	 * @name getList
	 * @desc �����ɍ��v����f�[�^�𓾂�
	 * @return �f�[�^�̔z��
	 **/
	function getList($fields=null, $raw=false) {
		global $DB_URI;
		if (!$inst) {
			$inst = DBConnection::getConnection($DB_URI);
		}
		if ($inst) {
			// �o�͈ʒu�A����
			if ($this->limit) {
				$page = array("offset" => $this->page * $this->limit, "limit" => $this->limit);
			}
			// �o�͏���
			if ($this->order) {
				$order = $this->order;
			}
			// ����
			if ($this->join) {
				array_unshift($this->join, array("table" => $this->table_name));
				$ret = $inst->search_data($this->join,  $this->search, $order, $page, $fields, $raw);
			} else {
				// �������s
				$ret = $inst->search_data($this->table_name,  $this->search, $order, $page, $fields, $raw);
			}
			if ($ret["count"]) {
				return $ret["data"];
			}
		}
		return array();
	}

	/**
	 * @name getData
	 * @desc �Y���f�[�^���擾����B
	 * @param $id �擾����id
	 * @return ���s���ʁi�z��Ɍ����ƁA�f�[�^������j
	 **/
	function getData($id, $fields, $raw, $table_name, $table_key) {
		global $DB_URI;
		if (!$inst) {
			$inst = DBConnection::getConnection($DB_URI);
		}
		if ($inst) {
			$where[] = array("field" => $table_key, "value" => $id);
			$ret = $inst->search_data($table_name, $where, null, null, $fields, $raw);
			if ($ret["count"] > 0) {
			//	$inst->db_close();
				return $ret["data"][0];
			}
		}
		return false;
	}

	/**
	 * @name addData
	 * @desc �f�[�^��ǉ�����B
	 * @param $data �ۑ�����f�[�^
	 * @return ���s����
	 **/
	function addData($data, $raw, $table_name, $table_key) {
 		global $DB_URI;
		if (!$inst) {
			$inst = DBConnection::getConnection($DB_URI);
		}
		if ($inst) {
			$ret = $inst->insert_data($table_name, $data, $raw);
			if ($ret) {
				$sql = "select last_insert_id() as id";
				$ret = $inst->search_sql($sql);
				if ($ret["count"]) {
				//	$inst->db_close();
					return $ret["data"][0]["id"];	// �}���f�[�^��ID
				}
			//	$inst->db_close();
				return false;	// ���s
			}
		//	$inst->db_close();
			return $ret;
		}
		return false;
	}

	/**
	 * @name updateData
	 * @desc �f�[�^���X�V����B
	 * @param $id �X�V����f�[�^ID
	 * @param $data �X�V����f�[�^
	 * @return ���s����
	 **/
	function updateData($id, $data, $raw, $table_name, $table_key) {
		global $DB_URI;
		if (!$inst) {
			$inst = DBConnection::getConnection($DB_URI);
		}
		if ($inst) {
			$where[] = array("field" => $table_key, "value" => $id, "cond" => "=");
			$ret = $inst->update_data($table_name, $data, $where, $raw);
		//	$inst->db_close();
			return $ret;
		}
		return false;
	}

	/**
	 * @name deleteData
	 * @desc �f�[�^���폜����B
	 * @param $id �폜����f�[�^ID�܂���ID�̔z��
	 * @return ���s����
	 **/
	function deleteData($id, $table_name, $table_key) {
		global $DB_URI;
		if (!$inst) {
			$inst = DBConnection::getConnection($DB_URI);
		}
		if ($inst) {
			if (is_array($id)) {
				$where[] = array("field" => $table_key, "value" => $id, "cond" => "in");
			} else {
				$where[] = array("field" => $table_key, "value" => $id, "cond" => "=");
			}
			$ret = $inst->delete_data($table_name, $where);
		//	$inst->db_close();
			return $ret;
		}
		return false;
	}
	/**
	 * @name findData
	 * @desc ����̃f�[�^�𓾂�
	 * @param $cond �擾����f�[�^�����̔z��
	 * @return �f�[�^��������΋�̔z��A���݂���΃f�[�^�̔z��
	 **/
	function findData($cond, $fields, $raw, $table_name, $order=null, $page=null) {
		global $DB_URI;
		if (!$inst) {
			$inst = DBConnection::getConnection($DB_URI);
		}
		if ($inst) {
			foreach ($cond as $field => $val) {
				$where[] = array("field" => $field, "value" => $val, "cond" => "=");
			}
			$ret = $inst->search_data($table_name, $where, $order, $page, $fields, $raw);
			if ($ret["count"] > 0) {
			//	$inst->db_close();
				return $ret["data"];
			}
		//	$inst->db_close();
		}
		return false;
	}
}
?>
