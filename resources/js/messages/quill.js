var toolbarOptions = [
    ['bold','italic','underline','strike'],
    [{'list':'ordered'},{'list': 'bullet'}],
    ['link'],

]

var quill = new Quill('#editor', {
    modules : {
        toolbar : toolbarOptions
    },

    theme: 'snow'
  });