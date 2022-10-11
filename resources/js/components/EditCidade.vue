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
										<input type="text" class="form-control" v-model="cidade.data.nome">
									</div>
									<div class="form-group">
										<label>Estado</label>
										<input type="text" class="form-control" v-model="cidade.sigla">
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
                cidade: {}
            }
        },
        created() {
            axios
                .get(`/api/v1/cidade/${this.$route.params.id}`)
                .then((res) => {
                    this.cidade = res.data;
                });
        },
        methods: {
            updateCidade() {
                let formData = new FormData();

                formData.append('nome', 'name');
                formData.append('sigla', 'date');
                formData.append('_method', 'PUT');
                formData.append('id', this.$route.params.id);
                const token = axios.get('/sanctum/csrf-cookie')
                const headers = {headers :
                        { Authorization: `Bearer ${token}`,
                            Accept :'application/json', 
                        }
                        };
                axios
                    .post(`/api/v1/cidade/`, formData, {headers})
                    .then((res) => {
                        this.$router.push({ name: 'cidade' });
                    });
            },
            
        }
    }
</script>