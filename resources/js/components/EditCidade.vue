<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Editar Cidade</h3>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<form @submit.prevent="updateCidade">
									<div class="form-group">
										<label>Nome</label>
										<input type="text" class="form-control" v-model="cidade.nome">
									</div>

                                    <div>
                                    <div style="display: none;" v-once>{{iduf}}</div>        
                                        <div class="form-group">
                                            <label for="estado">Estado</label>            
                                            <select :id="cidade.estado_id" class='form-control' v-model='cidade.estado_id'>
                                                <option value='0' disabled>Selecione um Estado</option>
                                                <option v-for='data in estados' :value='data.id' :key='data.id' :selected="estado === data.id">{{ data.nome }}</option>
                                            </select>
                                        </div>        
                                    </div>
									<button type="submit" class="btn btn-primary">Update</button>
								</form>
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
        data() {
            return {
                cidade: {},
                estado: 0,
                estados: [],
            }
        },
        created() {
            axios
                .get(`/api/v1/cidade/${this.$route.params.id}`)
                .then((res) => {
                    this.cidade = res.data;
                    this.estado = res.data.estado_id;
                });
              axios.get('/api/v1/getEstados')
              .then(function (response) {
                 this.estados = response.data;
              }.bind(this));
            
        },
        methods: {
            updateCidade() {
                const headers = {headers :
                        { 
                            Accept :'application/json', 
                            'Content-Type':'application/x-www-form-urlencoded',
                        }
                        };
                axios
                    .put(`/api/v1/cidade/${this.$route.params.id}`, this.cidade, {headers})
                    .then((res) => {
                        this.$router.push({ name: 'cidade' });
                    });
            }
            
        }
    }
</script>