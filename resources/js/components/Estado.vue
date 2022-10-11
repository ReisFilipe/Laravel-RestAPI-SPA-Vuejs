<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Estado</h3>
                    </div>


                    <div class="card-body">

                        <div class="columns medium-4" v-for="(result, index) in estados" :key="result.id">
                            <div class="card">
                            <div class="card-section">
                                <p> {{ index }} </p>
                            </div>
                            <div class="card-divider">
                                <p>$ {{ result.nome }}</p>
                            </div>
                            <div class="card-section">
                                <p>  {{ result.sigla }}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';



export default {
  name: "estado",
  data() {
    return {
      estados: {}
    };
  },
  created() {
    // GET request using axios with set headers
     
    const token = axios.get('/sanctum/csrf-cookie')
    const headers = {headers :
                  { Authorization: `Bearer ${token}`,
                    Accept :'application/json', 
                  }
                 };
    axios.get("http://127.0.0.1:8000/api/v1/estado/?fields=id,nome,sigla", { headers })
      .then(response => this.estados = response.data);
      
  }
};

</script>