<template>
    <div class="container">
        
        
         <div class="row">
            <div v-for="(blog, index) in list" v-bind:key="index" class="col .col-lg-6">
                    <div class="card" style="width: 18rem;">
                            <img v-bind:src="'/upload/'+ blog.image" class="card-img-top" >
                            <div class="card-body">
                            <h5 class="card-title">{{blog.title}}</h5>
                            <p class="card-text">{{blog.description}}</p>
                            <a v-bind:href="'/blog?id=' + blog.id" class="btn btn-primary">Real Full Blog</a>
                        </div>
                    </div>

                </div>
            </div> 
    </div>
           
  
    
</template>

<script>
    export default {
        data(){
            return{
                list:{
                },
            }
        },
        mounted() {
            this.allBlog();
            console.log('Component mounted.')
        },
        methods:{
              allBlog() {
                axios.get("/api/blogs").then(response => {
                    this.list = response.data;
                    
                }).catch(err => {
                    console.log(err);
                })
            },

        }
      
    }
</script>


