<template>
<div class="container">
   <br><br>
    
            <select class="custom-select custom-select-lg mb-3">
            <option selected>Choose your blog type</option>
            <option value="1">Travel</option>
            <option value="2">Food</option>
            <option value="3">Technology</option>
            </select>
            <h4>What would be the title of your blog?</h4>
        <form>
            <div class="form-group">
            <input type="text" class="form-control"  placeholder="your title" v-model="title">
            
            <br>
        
         
            <label for="textarea">Your Blog's Description</label>
            <textarea  class="form-control" id="textarea" rows="8" cols="96" v-model="description"></textarea>

            </div>
            <br>
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile"  @change="onFileChange">
            <label class="custom-file-label" for="customFile">Choose Picture accordingly</label>
            </div>
        </form>
        <br>
        <button type="button" class="btn btn-dark" @click="saveImage">Submit</button><br><br>

    
</div>
</template>

<script>
    export default {
        name: 'blog',
        mounted() {
            console.log('Component mounted.')
        },
        
         data() {
            return {
                title:'',
                description:'',
                filename: '',
                file: '',
                success: '',
                
                category:''   
           }
        },
        methods:{
            async saveImage(){
               
                let currentObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    }
                }
                // form data
                let formData = new FormData();
                formData.append('file', this.file);

                // send upload request
                let response= await axios.post('/api/savePicture', formData, config)
                console.log(response);
                    // .then(function (response) {

                    //     // currentObj.success = response.data.success;
                    //     // currentObj.filename = "";
                    //     //  console.log(response);
                        this.saveData(response.data.saveImage);

                    // })
                    // .catch(function (error) {
                    //     currentObj.output = error;
                    // });
               },
            saveData(saveImage){
                axios.post("/api/saveblog", {title: this.title , description: this.description ,image: saveImage}).then(response => {
                            alert ('Your Blog Has Been Saved');
                            console.log(response);
                            

                            window.location.href = "/blog?id=" + response.data.id; //taking id inside "?id" 

                        }).catch(err => {

                            console.log(err);
                        })
            },
            
            onFileChange(e) {
                //console.log(e.target.files[0]);
                this.filename = "Selected File: " + e.target.files[0].name;
                this.file = e.target.files[0];
            },
            // submitForm(e) {
            //     e.preventDefault();
            //     let currentObj = this;
            //     const config = {
            //         headers: {
            //             'content-type': 'multipart/form-data',
            //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            //         }
            //     }

            //     // form data
            //     let formData = new FormData();
            //     formData.append('file', this.file);

            //     // send upload request
            //     axios.post('/store_file', formData, config)
            //         .then(function (response) {
            //             currentObj.success = response.data.success;
            //             currentObj.filename = "";
            //         })
            //         .catch(function (error) {
            //             currentObj.output = error;
            //         });
            // },

        }         
  }
</script>
