<div class="modal-content">
  <?php echo $form ?>
</div>

<script>

(function() {

  var form      = $('.modal .form');
  var textarea  = $('#' + form.data('textarea'));
  var selection = textarea.getSelection();
  var urlField  = form.find('input[name=url]');
  var textField = form.find('input[name=text]');
  popupField = form.find('.field-name-popup input:checked');
  
  form.find('.field-name-popup input').change(function() {
    popupField = form.find('.field-name-popup input:checked');
  });
    
  if(selection.length) {
    if(selection.match(/^http|s\:\/\//)) {
      urlField.val(selection);
    } else {
      textField.val(selection);
    }
  }

  form.on('submit', function() {

    var url   = urlField.val();
    var text  = textField.val();
    var popup = popupField.val();
    
    console.log(popup);

    // make sure not to add invalid parenthesis
    text = text.replace('(', '[');
    text = text.replace(')', ']');

    pop = "";
    if(popup == "true") pop = " popup: yes";
    
    if(!text.length) {
      if(url.match(/^http|s\:\/\//) && popup != "true") {
        var tag = '<' + url + '>';
      } else if(form.data('kirbytext')) {
        var tag = '(link: ' + url + pop + ')';
      } else {
        var tag = '<' + url + '>';
      }
    } else if(form.data('kirbytext')) {
      var tag = '(link: ' + url + ' text: ' + text + pop + ')';
    } else {
      var tag = '[' + text + '](' + url + ')';
    }

    textarea.insertAtCursor(tag);
    app.modal.close();

  });

})();

</script>