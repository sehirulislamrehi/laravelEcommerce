/*!
 * Bracket Plus v1.1.0 (https://themetrace.com/bracketplus)
 * Copyright 2017-2018 ThemePixels
 * Licensed under ThemeForest License
 */

 'use strict';

 $(document).ready(function(){

  // This will collapsed sidebar menu on left into a mini icon menu
  $('#btnLeftMenu').on('click', function(){
    var menuText = $('.menu-item-label');

    if($('body').hasClass('collapsed-menu')) {
      $('body').removeClass('collapsed-menu');

      // show current sub menu when reverting back from collapsed menu
      $('.show-sub + .br-menu-sub').slideDown();

      $('.br-sideleft').one('transitionend', function(e) {
        menuText.removeClass('op-lg-0-force');
        menuText.removeClass('d-lg-none');
      });

    } else {
      $('body').addClass('collapsed-menu');

      // hide toggled sub menu
      $('.show-sub + .br-menu-sub').slideUp();

      menuText.addClass('op-lg-0-force');
      $('.br-sideleft').one('transitionend', function(e) {
        menuText.addClass('d-lg-none');
      });
    }
    return false;
  });



  // This will expand the icon menu when mouse cursor points anywhere
  // inside the sidebar menu on left. This will only trigget to left sidebar
  // when it's in collapsed mode (the icon only menu)
  $(document).on('mouseover', function(e){
    e.stopPropagation();

    if($('body').hasClass('collapsed-menu') && $('#btnLeftMenu').is(':visible')) {
      var targ = $(e.target).closest('.br-sideleft').length;
      if(targ) {
        $('body').addClass('expand-menu');

        // show current shown sub menu that was hidden from collapsed
        $('.show-sub + .br-menu-sub').slideDown();

        var menuText = $('.menu-item-label');
        menuText.removeClass('d-lg-none');
        menuText.removeClass('op-lg-0-force');

      } else {
        $('body').removeClass('expand-menu');

        // hide current shown menu
        $('.show-sub + .br-menu-sub').slideUp();

        var menuText = $('.menu-item-label');
        menuText.addClass('op-lg-0-force');
        menuText.addClass('d-lg-none');
      }
    }
  });



  // This will show sub navigation menu on left sidebar
  // only when that top level menu have a sub menu on it.
  $('.br-sideleft').on('click', '.br-menu-link', function(){
    var nextElem = $(this).next();
    var thisLink = $(this);

    if(nextElem.hasClass('br-menu-sub')) {

      if(nextElem.is(':visible')) {
        thisLink.removeClass('show-sub');
        nextElem.slideUp();
      } else {
        $('.br-menu-link').each(function(){
          $(this).removeClass('show-sub');
        });

        $('.br-menu-sub').each(function(){
          $(this).slideUp();
        });

        thisLink.addClass('show-sub');
        nextElem.slideDown();
      }
      return false;
    }
  });



  // This will trigger only when viewed in small devices
  // #btnLeftMenuMobile element is hidden in desktop but
  // visible in mobile. When clicked the left sidebar menu
  // will appear pushing the main content.
  $('#btnLeftMenuMobile').on('click', function(){
    $('body').addClass('show-left');
    return false;
  });



  // This is the right menu icon when it's clicked, the
  // right sidebar will appear that contains the four tab menu
  $('#btnRightMenu').on('click', function(){
    $('body').addClass('show-right');
    return false;
  });



  // This will hide sidebar when it's clicked outside of it
  $(document).on('click touchstart', function(e){
    e.stopPropagation();

    // closing left sidebar
    if($('body').hasClass('show-left')) {
      var targ = $(e.target).closest('.br-sideleft').length;
      if(!targ) {
        $('body').removeClass('show-left');
      }
    }

    // closing right sidebar
    if($('body').hasClass('show-right')) {
      var targ = $(e.target).closest('.br-sideright').length;
      if(!targ) {
        $('body').removeClass('show-right');
      }
    }
  });



  // displaying time and date in right sidebar
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#brDate').html(momentNow.format('MMMM DD, YYYY') + ' '
      + momentNow.format('dddd')
      .substring(0,3).toUpperCase());
      $('#brTime').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  // Datepicker
  if($().datepicker) {
    $('.form-control-datepicker').datepicker()
      .on("change", function (e) {
        console.log("Date changed: ", e.target.value);
    });
  }

  // custom scrollbar style
  new PerfectScrollbar('.sideleft-scrollbar', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.contact-scrollbar', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.attachment-scrollbar', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.schedule-scrollbar', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.settings-scrollbar', {
    suppressScrollX: true
  });

  // jquery ui datepicker
  $('.datepicker').datepicker();

  // switch button
  $('.br-switchbutton').on('click', function(){
    $(this).toggleClass('checked');
  });

  // peity charts
  $('.peity-bar').peity('bar');

  // highlight syntax highlighter
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });

  // Initialize tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Initialize popover
  $('[data-popover-color="default"]').popover();



  // By default, Bootstrap doesn't auto close popover after appearing in the page
  // resulting other popover overlap each other. Doing this will auto dismiss a popover
  // when clicking anywhere outside of it
  $(document).on('click', function (e) {
    $('[data-toggle="popover"],[data-original-title]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
        }

    });
  });



  // Select2 Initialize
  // Select2 without the search
  if($().select2) {
    $('.select2').select2({
      minimumResultsForSearch: Infinity,
      placeholder: 'Choose one'
    });

    // Select2 by showing the search
    $('.select2-show-search').select2({
      minimumResultsForSearch: ''
    });

    // Select2 with tagging support
    $('.select2-tag').select2({
      tags: true,
      tokenSeparators: [',', ' ']
    });
  }

});


$(document).ready( function () {
    $('#myTable').DataTable();
} );



$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
 });

 $('#image').change(function(){
          
    let reader = new FileReader();
    reader.onload = (e) => { 
    $('#image_preview_container').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
});

//create
$('#createAd').submit(function(e){
  e.preventDefault();

  var formData = new FormData(this);

  $.ajax({
    type: 'POST',
    url: 'create',
    data: formData,
    cache:false,
    contentType: false,
    processData: false, 
    dataType: 'json',
    success: function(data){

        $("#adTable").prepend(
        '<tr class="table-row" data-id="'+ data.id +'" ><td class="ad-image"><img src="/images/ad/'+data.image+'" width="50px"></td><td class="ad-title">'+ data.title +'</td><td class="ad-description">'+ data.description +'</td><td><button class="btn btn-primary edit" data-toggle="modal" data-target="#editadvertisement">Edit</button><button class="btn btn-danger delete" data-toggle="modal" data-target="#deleteadvertisement">Delete</button></td></tr>'
        );
        swal(" ", "Advertisement added successfully", "success");
        
        console.log(data.image);
     

      
    },
    
  })

})

//edit
$(document).on('click', '.edit', function(){
  let ad = $(this).closest('tr').data('id');

  let modal = $("#editAd");
  $.ajax({
    type  : "GET",
    url   : "edit/" + ad,
    success : function(data){
      $(modal).find('#editName').val(data.title);
      $(modal).find('#editDescription').val(data.description);
      $(modal).find('#editImage').attr('src','/images/ad/'+ data.image);
      $(modal).attr('data-id', data.id);
    },
    error: function(error){
      console.log(error);
    }
  })
})


//update
$("#editAd").submit(function(e){
  e.preventDefault();
  let id = $("#editAd").attr("data-id");
  console.log(id);
  let adrow = $("#adTable").find('tr[data-id="'+ id +'"]');
  var formData = new FormData(this);
  console.log(formData);

  $.ajax({
    type: 'POST',
    url: 'edit/' + id,
    data: formData,
    cache:false,
    contentType: false,
    processData: false, 
    dataType: 'json',
    success: function(data){
     
     $(adrow).find("td.ad-title").text(data.title);
     $(adrow).find("td.ad-description").text(data.description);
     $(adrow).find("td.ad-image img").attr('src','/images/ad/'+ data.image);
      
      swal(" ", "Advertisement updated successfully", "success");
      
      console.log(data.image);
    },
    error: function(error){
      swal(" ", "Please fill up the text field", "warning");
    }
  })
})

//delete
$(document).on('click', '.delete', function(){
  let deleteAd = $(this).closest('tr').data('id');
  //console.log(deleteAd);
  $("#deleteAd").attr('data-id', deleteAd);

})
$("#deleteAd").submit(function(e){
  e.preventDefault();
  let deleteid = $("#deleteAd").attr("data-id");
  let adrow = $("#adTable").find('tr[data-id="'+ deleteid +'"]');
  console.log(deleteid);
  
  $.ajax({
    type : "POST",
    url : "delete/" + deleteid,
    success: function(){
      $(adrow).remove();
      swal("","Deleted successfully", "success");
    }

  })
  
})









$(document).ready(function(){
  $(document).on('submit','.ajax-form', function(event){
    event.preventDefault();

    let $this = $(this);
    $this.find(".has-danger").removeClass('has-error');
    $this.find(".form-error").remove();

    var formData = new FormData(this);

    $.ajax({
      type: $this.attr('method'),
      url: $this.attr('action'),
      data: formData,
      
      success: function(response){
          swal("","Data Inserted Successfully","success")
          // $("input[type=text]").val('');
          // $("input[type=email]").val('');
          // $("textarea").val('');
      },
      error: function(response){
        let data = response.responseJSON
        
        $.each(data.errors,function(key,value){
          $("[name^="+key+"]").parent().addClass('has-danger');
          $("[name^="+key+"]").parent().append('<p class="form-error"><small class="color-red text-muted">'+ value[0] +'</small></p>')
          
        });
      },
      cache: false,
        contentType: false,
        processData: false,
    })

  })
})