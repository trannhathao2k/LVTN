(function () {
    var imageUpload = function () {
        var self = this;
        this.selector = {
            fileInput: document.getElementById('imageUploadInput'),
            fileInputBtn: document.getElementById('imageUploadInputBtn'),
            imagePreview: document.getElementById('imagePreview'),
            status: document.getElementById('uploadFileStatus'),
            status2: document.getElementById('uploadFileStatus2'),
            status3: document.getElementById('uploadFileStatus3'),
            // sendBtn: document.getElementById('sendData'),
            infoName: document.getElementById('fileInfomation_name'),
            infoType: document.getElementById('fileInfomation_type'),
            infoSize: document.getElementById('fileInfomation_size'),
            imageDefault: document.getElementById('imageDefault'),
            avatarkh: document.getElementById('avatarkh'),
            fileName: document.getElementById('fileName'),
            fileType: document.getElementById('fileType'),
            fileSize: document.getElementById('fileSize'),
        };
        this.imageData = "";
        this.fileTypes = ['image/png', 'image/jpeg'];
        this.maxSize = 10 * 1024 * 1024; // 10MB
        this.uploadUrl = 'https://tutrithuc.com/TestAPI/imageUpload';
        this.onChangeInput = function (e) {
            // Reset file data / image preview
            self.selector.status.innerHTML = '';
            self.selector.imagePreview.setAttribute('src', "img/default.jpg");
            self.imageData='';
            
            // Get the current file upload
            var file = e.target.files[0];   
            this.selector.infoName.innerHTML = file.name;
            this.selector.avatarkh.value = file.name;
            // this.selector.infoType.innerHTML = file.type;

            // size = (file.size / (1024 * 1024)).toFixed(1);
            // if((file.size / (1024 * 1024)).toFixed(0) == 0) {
            //     miniSize = (file.size / 1024).toFixed(0);
            //     this.selector.infoSize.innerHTML = miniSize + " Kb";
            // }
            // else {
            //     this.selector.infoSize.innerHTML = size + " Mb";
            // }
             // in bytes

            // self.selector.cancel.innerHTML = '<button class="btn btn-danger btn-rounded btn-sm mt-3 mb-3" id="cancelData">HỦY BỎ</button>';
            self.selector.fileName.innerHTML = "Tên file:";
            self.selector.fileType.innerHTML = "Định dạng (JPG hoặc PNG):";
            self.selector.fileSize.innerHTML = "Dung lượng (Dưới 10M):";
            


            var check = 0;
            // Validate file type
            if (this.fileTypes.indexOf(file.type) == -1) {
                self.selector.status3.innerHTML = `<div class='text-center text-danger mb-3' style='font-size: 12px'>File không hợp lệ (chỉ nhận file JPG hoặc PNG)</b>`;
                this.selector.infoType.innerHTML = `<b style='color: red'>${file.type}</b>`; 
                check = 1;
            }
            else {
                this.selector.infoType.innerHTML = `<b style='color: green'>${file.type}</b>`;
                self.selector.status3.innerHTML = "";             
            };
            
            // Validate file size
            if (file.size > this.maxSize) {
                self.selector.status2.innerHTML = "<div class='text-center text-danger mb-3' style='font-size: 12px'>Dung lượng file vượt quá giới hạn (tối đa 10MB)</b>";
                size = (file.size / (1024 * 1024)).toFixed(1);
                if((file.size / (1024 * 1024)).toFixed(0) == 0) {
                    miniSize = (file.size / 1024).toFixed(0);
                    this.selector.infoSize.innerHTML = `<b style='color: red'>${miniSize} Kb</b>`;
                }
                else {
                    this.selector.infoSize.innerHTML = `<b style='color: red'>${size} Mb</b>`;
                }
                check = 1;
            }
            else {
                size = (file.size / (1024 * 1024)).toFixed(1);
                if(Math.floor(file.size / (1024 * 1024)) == 0) {
                    miniSize = (file.size / 1024).toFixed(0);
                    this.selector.infoSize.innerHTML = `<b style='color: green'>${miniSize} Kb</b>`;
                }
                else {
                    this.selector.infoSize.innerHTML = `<b style='color: green'>${size} Mb</b>`;
                }
                self.selector.status2.innerHTML = "";
            }

            if(check == 0) {
                self.selector.status.innerHTML = "<div class='text-center text-success mb-3 font-weight-bold''>Ảnh hợp lệ</div>";
            }

            var reader = new FileReader();
            reader.onload = function (e) {
                self.imageData = e.target.result;
                
                // Validate file content
                self.selector.imagePreview.onerror = function(){
                    self.imageData = "";
                    self.selector.imagePreview.setAttribute('src', "img/default.jpg");
                    // self.selector.status.innerHTML = "<div class='card bg-danger text-center rounded wrapper-ul white-text font-weight-bold mb-3'>Dung lượng file vượt quá giới hạn (tối đa 10MB được chấp nhận)</b>";
                };
                self.selector.imagePreview.setAttribute('src', self.imageData);
            };
            reader.readAsDataURL(file);
        };
        this.cancelData = function () {
            // Validate when file content is empty
            // if (this.imageData == ""){
            //     self.selector.status.innerHTML = 'Vui lòng chọn hình để tải lên';
            //     return;
            // }
            
            // Prevent double click
        //     var data = {
        //         'imageData': this.imageData
        //     };
        //     this.imageData = "";
            
        //     var request = new XMLHttpRequest();
        //     request.open("POST", this.uploadUrl);
        //     request.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
        //     request.onreadystatechange = function () {
        //         if (this.readyState === 4 && this.status === 200) {
        //             self.selector.status.innerHTML = "Upload thành công";
        //         } else {
        //             console.log(this.responseText);
        //             self.selector.status.innerHTML = "Đã có lỗi xảy ra, không upload được hình";
        //         }
        //     };

        //     // Send request to server
        //     request.send(JSON.stringify(data));
            // self.selector.imageDefault.innerHTML = '<img src="img/default.jpg" alt="Ảnh xem trước" id="imagePreview" height="200px" width="200px">';
        };

        /*
         * Event trigger
         */
        this.selector.fileInput.addEventListener('change', function (e) {
            self.onChangeInput(e);
        });
        this.selector.fileInputBtn.addEventListener('click', function () {
            self.selector.fileInput.click();
        });
        this.selector.sendBtn.addEventListener('click', function () {
            self.cancelData();
        });

    };
    window.addEventListener("DOMContentLoaded", function () {
        console.log('DOM is loaded');
        new imageUpload();
    });
})();