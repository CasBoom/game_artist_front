<header>
    <a class="glu_logo_wrapper" href="index.php">
        <div class="glu_logo">
        </div>
    </a>
    <?php
    // sorry
            if(isset($index)){
                echo '<div class="filter">
                    <form  action="" method="get">
                    Periode: <select id="periode" name="f_period">
                        <option value=""></option >';
                        for($i = 1; $i<=16; $i++)
                        {
                        echo "<option value='$i'> Periode $i</option>";
                        }
                        echo '</select>';
                    echo '
                        Les: <select id="les" name="f_klas">
                            <option value=""  required></option >';
                            foreach($miscs["lessons"] as $les)
                            {
                            echo "<option value='".$les['id']."'  required>".$les['lesson']."</option >";
                            }
                    echo '</select>';
                    echo "
                        Tag: 
                        <select name='filter'>
                            <option value=''  ></option >";
                            foreach($miscs['tags'] as $tag)
                            {
                                echo "<option value='".$tag['id']."'>".$tag['tag']."</option>";
                            }
                            echo "
                        </select required>
                        <input type='submit'>
                    </form>
                </div>
                ";
            }
            if($user['role']<=2){
                echo "<a href='admin.php' class='cool_button admin'>Admin</a>";
            }
        ?>
        
    <a href="?logout" class="cool_button logout">Logout</a>
</header>
<?php
    if(isset($_GET['logout']))
    {
        session_destroy();
    }
?>