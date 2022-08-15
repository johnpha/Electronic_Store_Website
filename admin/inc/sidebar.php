<div class="grid_2">
    <div class="box sidemenu">
        <?php
        function checkprivilege($uri)
        {

            $id = Session::get('adminId');
            $level = Session::get('level');
            $privilegeClass =  new privileges();

            $priGr = $privilegeClass->showprivilegeAllPri($level);
            // return $priGr['url_match'];
            
            if($priGr){
                while($result = $priGr->fetch_assoc()){
                    // var_dump($result['url_match']);
                    if($result['url_match'] == $uri){
                        // var_dump("true");
                        return true;
                    }
                }
                
                // exit;
            }
            return false;
        }
        ?>
        <div class="block" id="section-menu">

            <ul class="section menu">
                <?php
                $privilegeClass =  new privileges();
                $level = Session::get('level');
                $priGr = $privilegeClass->viewPriGr($level);
                $arrayCheck = array();
                $arrayIDCheck = array();
                $i=0;
                while ($result1 = $priGr->fetch_assoc()) {
                    // $name = ;
                    $arrayCheck[$i] = $result1['priGrName'];
                    $arrayIDCheck[$i] = $result1['priGrID'];
                    $i++;
                }
                $arrayCheck1 = array_unique($arrayCheck);
                $arrayIDCheck1 = array_unique($arrayIDCheck);
                    $j=0;

                if ($priGr) {
                    foreach($arrayCheck1 as $k=>$v){
                        $name = $v;

                ?>
                        
                        <li><a class="menuitem"><?php echo $name ?> Option</a>
                            <ul class="submenu">
                                <?php
                                
                                $priGr = $privilegeClass->showPri($level);
                                while($result = $priGr->fetch_assoc()){
                                        $url = $result['url_match'];
                                        $namePri = $result['priName'];
                                        if($result['view']==1 && $result['priGrID'] == $arrayIDCheck1[$k]){
                                             echo " <li><a href='$url'>$namePri</a></li>";
                                        }

                                }

?>
                                <?php 
                                
                                ?>
                            </ul>
                        </li>

                        <!-- <li><a class="menuitem">Brand Option</a>
                    <ul class="submenu">
                        <li><a href="brandadd.php">Add Brand</a> </li>
                        <li><a href="brandlist.php">Brand List</a> </li>
                    </ul>     
                </li>-->
                <?php
                    }
                    // var_dump(array_unique($arrayCheck));exit;
                }
                // exit;
                ?>
            </ul>
        </div>
    </div>
</div>