<div style="background: #f2f2f2; width: 100%; padding: 2em 0;">
<section class="categories">
    <hgroup>
      <h2><b>Browse</b> our software categories</h2>
      <h4>Find your software in one of our 300+ categories - from Accounting to Yoga, we cover it all!</h4>
    </hgroup>
    <main class="content">
      <div class="cat-list">
        <form>
          <input type="text" id="cat-search" placeholder="Search in categories"></input>
          <div class="cat-view">
              <?php $cats=Categories::model()->findAllByAttributes(array('status'=>1));
                $cnt = 0;
                $ascii = 65;
                foreach($cats as $cat){
                    $url = $this->createAbsoluteUrl('product/index',array('id'=>$cat->id));
                    if(ctype_digit($cat->name[0])){
                        if($cnt==0){
                            echo '<div class="cat-row">
                                      <h2>#</h2>
                                          <ul>
                                            <a href="'.$url.'"><li>'.$cat->name.'</li></a>';
                            $cnt=1;
                        }
                        else if(ctype_digit($cat->name[0])){
                            echo '<a href="'.$url.'"><li>'.$cat->name.'</li></a>';
                        }
                    }
                    else{
                        if(ord($cat->name)==$ascii){
                            if($cnt!=0){
                              echo '</ul></div>';
                              $cnt=1;
                            }
                            echo '<div class="cat-row">
                                  <h2>'.$cat->name[0].'</h2>
                                  <ul>
                                  <a href="'.$url.'"><li>'.$cat->name.'</li></a>';
                            $ascii++;
                        }
                        else if(ord($cat->name)==$ascii-1){
                            echo '<a href="'.$url.'"><li>'.$cat->name.'</li></a>';
                        }
                    }
                }
                echo '</ul></div>';
                ?>
          </div>
        </form>
      </div>

      <div class="popular-cat">
        <h3>Popular Categories</h3>
        <form><ul></ul>
          <ul>
            <li><a href="#">Applicant Tracking</a></li>
            <li><a href="#">Church</a></li>
            <li><a href="#">Contact Management</a></li>
            <li><a href="#">Accounting</a></li>
            <li><a href="#">Construction</a></li>
            <li><a href="#">Field Service</a></li>
            <li><a href="#">Learning Management System</a></li>
            <li><a href="#">Maintenance</a></li>
            <li><a href="#">Project Management</a></li>
          </ul>
        </form>
      </div>
    </main>
  </section>
  </div>