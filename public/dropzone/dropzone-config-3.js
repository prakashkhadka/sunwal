


var photo_counter = 0;

Dropzone.options.realDropzone = {
    uploadMultiple: true,       // This allows to upload multiple files
    parallelUploads: 100,     // This allows mentioned number of files to be uploaded at once
    maxFilesize: 45,            // Maximum file size at once
    maxFiles: 5,
    autoProcessQueue: false,
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg,.JPEG,.JPG",
    previewsContainer: '#dropzonePreview',
    previewTemplate: document.querySelector('#preview-template').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'हटाउनुस',
    dictFileTooBig: 'यो फोटोको साइज अति धेरै भयो | अलि कम साइजको फोटो राख्नुहोस |',
   
    // The setting up of the dropzone
    init:function() {

      // Following code executes only if file is added

       this.on("addedfile", function(file) { 

           $('#submitfiles').on("click", function (e) {
              tinyMCE.triggerSave(true, true);
              //e.preventDefault();
              //e.stopPropagation();
              
          });
            
          var myDropzone = this;
          
          $('#submitfiles').on("click", function (e) {
            //The following two lines are not required
            if($(".myForm").valid()){
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            }
          });
         
         
        });
       this.on("error", function(files, response){
         
          //$('#errorModal').modal('show');
          //$('#waitModal').modal('hide');
           
        });
        this.on("processing", function(files, response) {
          
         
        });
        this.on("sending", function(files, response) {
          
          
          //window.location.href = "/user/post/create";
          //alert("एक छिन पर्खनुस ");
          $('#waitModal').modal('show');
        });
        this.on("queuecomplete", function(files, response) {
        
         
        });
        this.on("success", function(files, response) {
          
          
          //window.location.href = "/user/post/create";
          //alert("तपाइको फोटोहरु प्राप्त भयो");
          $('#waitModal').modal('hide');
          $('#successModal').modal('show');
        });
        this.on("maxfilesexceeded", function(files, response) {
          $('#maxFileErrorModal').modal('show');
          this.removeFile(files)
          //alert("५ ओटा भन्दा धेरै फोटो नराख्नुहोस ");
          
        });
        this.on("sendingmultiple", function() {
          //alert("Sending multiple files");
        // Gets triggered when the form is actually being sent.
        // Hide the success button or the complete form.
        });
        this.on("successmultiple", function(files, response) {
          //alert("multiple successful");
          // Gets triggered when the files have successfully been sent.
          // Redirect user or notify of success.
        });
        this.on("errormultiple", function(files, response) {
          //alert("multiple error");
          // Gets triggered when there was an error sending the files.
          // Maybe show form again, and notify user of error
        });

    }
}
