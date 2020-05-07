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
                        Les: <select id="les" name="f_klas" required>
                            <option value=""  required></option >';
                            foreach($miscs["lessons"] as $les)
                            {
                            echo "<option value='".$les['id']."'  required>".$les['lesson']."</option >";
                            }
                    echo '</select required> 
                    Periode: <select id="periode" name="period" required>
                        <option value=""  required></option >';
                        for($i = 1; $i<=16; $i++)
                        {
                        echo "<option value='$i'> Periode $i</option>";
                        }
                    echo '</select required>';
                    echo "
                        Tag: 
                        <select name='tag_add'>
                            <option value=''  required></option >";
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