


<!--bildirim menüsü oluştruluyor.bildirim simgesine tıklandığında açılır ve  bildirimleri gösterir -->

<!--dropdown bildirimlerin belirli bir düzende liste halinde tutulmasını sağlar-->
<div class="dropdown">
    <!--data-toggle-data-target  bildirimlerin açılıp-kapanması için kullanılır.href tıklandığında yönlendirilecek urli belirtir -->
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
      <!--bildirim simgesini temsil eden ikon ekler (zil sembolü) -->
    <i class="glyphicon glyphicon-bell"></i>
  </a>
<!--bildirimlerin gösterileceği menü listesi tanımlandı.task menünün arayüz kısmında görüntülenmesinde ,role="menu" ve aria-labelledby="dLabel"  menünün bir açılır menü olduğunu belirtmek için eklenmiştir  -->
  <ul class="dropdown-menu task" role="menu" aria-labelledby="dLabel">
<!-- menü başlığı task olarak belirtilmiştir. view all tüm görevleri görüntülemek için tanımlanmıştır. pull-right ögeyi sağ tarafa konumlandırır-->
    <div class="task-heading"><h4 class="menu-title">Task</h4><h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
    </div>
     <!-- menüdeki ögeleri ayırmak için ayırıcı eklenmiştir-->
    <li class="divider"></li>
     <!-- bildirimlerin listeleneceği bölüm-->
   <div class="task-wrapper">
       <!-- her bir bildirimin ayrı bağlantı içinde -->
     <a class="content" href="#">
      <!-- Her bir bildirimin içeriğini oluşturan bir bölümdür. -->
       <div class="task-item">
       <!-- bildirim başlığı ayarlanır-->
        <h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
         <!-- bildirim detayları ayarlanır-->
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>

    </a>
     <!-- bildirimler oluşturuluyor-->
     <a class="content" href="#">
      <div class="task-item">
        <h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>
     <a class="content" href="#">
      <div class="task-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>
     <a class="content" href="#">
      <div class="task-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>

    </a>
     <a class="content" href="#">
      <div class="task-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>
     <a class="content" href="#">
      <div class="task-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>

   </div>
    <li class="divider"></li>
     <!-- view all tüm bildirimleri görüntülemek için kullanılır-->
    <div class="task-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>
  </ul>

</div>