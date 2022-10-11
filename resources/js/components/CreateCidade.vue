<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Cidade</h3>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<form @submit.prevent="addCidade">
									<div class="form-group">
										<label>Nome</label>
										<input type="text" class="form-control" v-model="cidade.nome">
									</div>
									<div class="form-group">
										<label>Sigla</label>
										<input type="text" class="form-control" v-model="cidade.sigla">
									</div>
									<button type="submit" class="btn btn-primary">Create</button>
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
        methods: {
            addCidade() {
                const token = axios.get('/sanctum/csrf-cookie')
                const headers = {headers :
                  { Authorization: `Bearer ${token}`,
                    Accept :'application/json', 
                    "Content-Type":'multipart/form-data',
                  }
                 };
                axios
                    .post('http://localhost:8000/api/v1/cidade', this.cidade, { headers })
                    .then(response => (
                        this.$router.push({ name: 'cidade' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>