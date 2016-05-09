<div class="modal-content pagelink">

  <script type="text/javascript">
    $(document).ready(function(){
      $(".slidedown.active").on('click', function() {
        $(this).toggleClass("open")
               .closest(".page").children(".subpages").slideToggle(250, function() {
                  $(".modal-content").data('height', $(".modal-content").height());
                 $(".modal-content").animate({
                     marginTop: -(Math.round($(".modal-content").data('height') / 2))
                 }, 150);
               });
      });
      $(".link.smalllink").on('click', function() {        
        textarea = $("#" + $(".modal form").data("textarea"));
        link = $(this).data("link");
        name = $(this).siblings(".name").html();
        var sel  = textarea.getSelection();
        if(sel.length > 0) name = sel;
        textarea.insertAtCursor("(link: " + link + " text: " + name + ")" );
        textarea.trigger('autosize.resize');
        app.modal.close();
      });
    });
  </script>
  
  <form class="form" data-textarea="form-field-<?= $fieldname ?>" data-autosubmit="false" data-kirbytext="true">

    <div class="pages">
      <div class="rootpages">
        <? 
        $subpages = site()->children();
        if (!function_exists("listpages")) {
          function listpages($subpages) {
            foreach ($subpages as $subpage) {
              echo('<div class="page"><div class="pagename">');
              echo('<span class="name">' . $subpage->title() . '</span>');
              if ($subpage->num() != "") $number = $subpage->num();
              else $number = "–";
              echo('<span class="number smallbox">' . $number . '</span>');
              echo('<span class="link smallbox active smalllink" data-link="' . $subpage->uri() . '"><i class="icon fa fa-link"></i></span>');
              if($subpage->children()->count() > 0) echo('<span class="slidedown active smallbox smalllink"><i class="icon fa fa-angle-down"></i></span>');
              else echo('<span class="slidedown smallbox smalllink">–</span>');
              echo('</div><div class="subpages d' . $subpage->depth() . '" style="background-color: rgba(0,0,0,' . $subpage->depth()/25 . ')">');
              if($subpage->children()->count() > 0)listpages($subpages = $subpage->children());
              echo('</div></div>');
            }
          }
        }
        listpages($subpages = site()->children());
        ?>
      </div>
    </div>
  
  </form>
  
</div> 