<?php
/**
 * 
 */

class QueryBuild extends Model
{		
	//查询字段
	protected $select = '*';
	//表
    protected $from;
	//条件
    protected $where;
    //排序
    protected $orderBy;
    //limit
    protected $limit;
    //offset
    protected $offset = 0;
    //分组
    protected $groupBy;
    //分组条件
    protected $having;
    //左连
    protected $leftTable;
    protected $leftOn;
    //右连
    protected $rightTable;
    protected $rightOn;

    //更新插入的表
    protected $table;

    //更新的数组
    protected $dataArr;

	//查询使用字符串
	public function select($secectStr){
		 $this->select = $secectStr;
		 return $this;
	}

	//表名
	public function from($fromStr){
		 $this->from = $fromStr;
		 return $this;
	}

	//where条件
    public function where($whereStr){
	    $this->where = $whereStr;
	    return $this;
    }

    //limit
    public function limit($limitNum){
	    $this->limit = $limitNum;
	    return $this;
    }

    //offset
    public function offset($offsetNum){
	    $this->offset = $offsetNum;
	    return $this;
    }

    //排序
    public function orderBy($orderByStr){
	    $this->orderBy = $orderByStr;
	    return $this;
    }

    //分组
    public function groupBy($groupByStr){
	    $this->groupBy = $groupByStr;
	    return $this;
    }

    //分组条件
    public function having($havingStr){
	    $this->having = $havingStr;
	    return $this;
    }

    //左连
    public function leftJoin($table,$on){
        $this->leftTable = $table;
        $this->leftOn = $on;
        return $this;
    }

    //右连
    public function rightJoin($table,$on){
        $this->rightTable = $table;
        $this->rightOn = $on;
        return $this;
    }

    //更新、插入的表
    public function setTable($table){
	    $this->table = $table;
	    return $this;
    }

    //更新的数据
    public function addData($data){
	    $this->dataArr = $data;
	    return $this;
    }

//	//设置数据库
//	public function setDateBase($dateBaseStr){
//		$GLOBALS['config']['db'] = $dateBaseStr;
//		return $this;
//	}

	//查询所有
	public function all(){
		$sql = "select {$this->select} from {$this->from}";
		if ($this->leftTable && $this->leftOn){
		    $sql .= " left join ".$this->leftTable.' on '.$this->leftOn;
        }
        if ($this->rightTable && $this->rightOn){
            $sql .= " right join ".$this->rightTable.' on '.$this->rightOn;
        }
		if ($this->where){
		    //where前后要有空格
		    $sql .= " where ".$this->where;
        }
        if ($this->orderBy){
            $sql .= " order by ".$this->orderBy;
        }
        if ($this->limit){
            $sql .= " limit ".$this->offset.','.$this->limit;
        }
        if ($this->groupBy){
            $sql .= " group by ".$this->groupBy;
        }
        if ($this->having){
            $sql .= " having ".$this->having;
        }

		return $this->db->fetchAll($sql);
	}

	//查询单条
	public function one(){
		$sql = "select {$this->select} from {$this->from}";
        if ($this->leftTable && $this->leftOn){
            $sql .= " left join ".$this->leftTable.' on '.$this->leftOn;
        }
        if ($this->rightTable && $this->rightOn){
            $sql .= " right join ".$this->rightTable.' on '.$this->rightOn;
        }
		if ($this->where){
            $sql .= " where ".$this->where;
        }
        if ($this->orderBy){
            $sql .= " order by ".$this->orderBy;
        }
        if ($this->limit){
            $sql .= " limit ".$this->offset.','.$this->limit;
        }
        if ($this->groupBy){
            $sql .= " group by ".$this->groupBy;
        }
        if ($this->having){
            $sql .= " having ".$this->having;
        }
//        var_dump($sql);exit;
        return $this->db->fetch($sql);
	}


    /*
     * 更新操作(返回受影响的记录数)
     * $list =
				// (new QueryBuild('test'))
				(new QueryBuild)
                        ->setTable('student')
                        ->where('id=21')
                        ->addData([
                            'grade' => 111,
                            'images' => '111',
                        ])
						->update();
     */
    public function update(){
	    $setStr = '';
	    $count = count($this->dataArr);
	    $i = 1;
	    foreach ($this->dataArr as $key => $item){
                if ($i == $count){
                    $setStr .= "{$key}='{$item}'";
                }else{
                    $setStr .= "{$key}='{$item}',";
                }
                $i++;
        }
	    $sql = "update {$this->table} set {$setStr} where {$this->where}";

        $this->db->exec($sql);


	    return $this->db->num;
    }

    /*
     * 插入操作（返回新增主键id）
     * $list =
				// (new QueryBuild('test'))
				(new QueryBuild)
                        ->setTable('student')
                        ->addData([
                            'grade' => 11,
                            'images' => '11',
                        ])
						->insert();
     */
    public function insert(){
	    $column = '';
	    $value = '';
	    $count = count($this->dataArr);
	    $i = 1;
	    foreach ($this->dataArr as $key => $item){
	        if ($i == $count){
                $column .= "{$key}";
                $value .= "'{$item}'";
            }else{
                $column .= "{$key},";
                $value .= "'{$item}',";
            }
            $i++;
        }
	    $sql = "INSERT INTO {$this->table} ($column) VALUES ($value)";

	    $this->db->exec($sql);


	    return $this->db->insertId;
    }

    /*
     * 删除操作(返回受影响的记录数)
     * $list =
				// (new QueryBuild('test'))
				(new QueryBuild)
                        ->setTable('student')
                        ->where('id=21')
						->delete();
     */
    public function delete(){
        $sql = "DELETE FROM {$this->table}";

        if ($this->where){
            $sql .= " where ".$this->where;
        }

        $this->db->exec($sql);

        return $this->db->num;
    }
	
}