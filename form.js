function funcBeforeFirst () {
  console.log($("input[name='proxy-type']:checked").val())
  $('#response').hide()
  $('#code').text('')
  $('#loading').show()
}

function funcSuccessFirst (data) {
  $('#loading').hide()


  if (data !== ''){
    $('#code').text(' response code: ' + JSON.parse(data).code)
    $('#response').show()
  } else {
    $('#code').text('Can\'t parse')
    $('#response').show()
  }


}

$.validator.addMethod('filesize', function (value, element, param) {
  return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}')

$.validator.addMethod('regexp', function (value, element, params) {
  var expression = new RegExp(params)
  return this.optional(element) || expression.test(value)
}, 'Enter full phone number')

$(function () {
  $.validator.setDefaults({
    highlight: function (element) {
      $(element).closest('.form-control').addClass('is-invalid')
    },
    unhighlight: function (element) {
      $(element).closest('.form-control').removeClass('is-invalid')
    },
  })

  $('#first').validate({
    rules: {
      url: {
        maxlength: 100,
      },
    },
    messages: {
      url: {
        maxlength: 'Please enter no more than 100 characters.',
      },
    },
    submitHandler: function () {
      $.ajax({
        url: '/p',
        type: 'POST',
        data: ({
          url: $('#url').val(),
          proxy: $('#proxy').val(),
          proxyType:$("input[name='proxy-type']:checked").val()
        }),
        enctype: 'multipart/form-data',
        datatype: 'html',
        beforeSend: funcBeforeFirst,
        success: funcSuccessFirst,
      })
    },
  })

  $('#second').validate({
    rules: {
      photo: {
        extension: 'png|jpe?g|gif',
        filesize: 5242880,
      },
      company: {
        maxlength: 70,
      },
      position: {
        maxlength: 100,
      },
      about: {
        maxlength: 21844,
      },
    },
    messages: {
      photo: {
        extension: 'Only .png, .jpg, .jpeg, .gif files allowed.',
        filesize: 'File must be less then 5 Mb.',
      },
      company: {
        maxlength: 'Please enter no more than 70 characters.',
      },
      position: {
        maxlength: 'Please enter no more than 100 characters.',
      },
      about: {
        maxlength: 'Please enter no more than 21844 characters.',
      },
    },
    submitHandler: function (form) {

      $.ajax({
        url: '/showIcons',
        type: 'POST',
        data: new FormData(form),
        processData: false,
        contentType: false,
        enctype: 'multipart/form-data',
        datatype: 'html',
        beforeSend: funcBeforeSecond,
        success: funcSuccessSecond,
      })
    },
  })

})




$(document).ready(function () {
  $('#response').hide()
  $('#loading').hide()
})


