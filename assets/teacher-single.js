 $(document).ready(function(){
  $('#filer_input').filer({
     showThumbs: true,
  addMore: true,
  allowDuplicates: false,
  appendTo: '.n_img',
  extensions: ["jpg", "png", "gif"],
  });
 });

  $('.datepicker').datepicker({
  format: 'yyyy-mm-dd' 
  });

