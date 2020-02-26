<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="alert alert-danger col-md-12" v-if="errors">
                <ul>
                    <li v-for="error in errors" :key='error'>{{ error[0] }}</li>
                </ul>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Contato</div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://images.pexels.com/photos/821755/pexels-photo-821755.jpeg" class="img-fluid m-2">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body form-group">

                            <form action="" method="post" class="needs-validation">
                                <div class="form-group">
                                    <input placeholder="Nome" 
                                           type="nome" 
                                           name="nome" 
                                           id="nome" 
                                           v-model.trim="$v.nome.$model"   
                                           class="form-control form-control-sm" :class="{ 'is-invalid': $v.nome.$error }"
                                    >
                                    <div class="text-danger" v-if="$v.nome.$error && !$v.nome.required"><small>Campo obrigatório.</small></div>
                                    <div class="text-danger" v-if="$v.nome.$error && !$v.nome.alpha"><small>Campo em formato inválido.</small></div>
                                </div>

                                <div class="form-group">
                                    <input placeholder="E-mail" 
                                           type="email" 
                                           name="email" 
                                           id="email" 
                                           v-model="email" 
                                           class="form-control form-control-sm"  :class="{ 'is-invalid': $v.nome.$error }"
                                    >
                                    <div class="text-danger" v-if="$v.email.$error && !$v.email.required"><small>Campo obrigatório.</small></div>
                                    <div class="text-danger" v-if="$v.email.$error && !$v.email.email"><small>Campo em formato inválido.</small></div>
                                </div>

                                <div class="form-group">
                                    <the-mask :mask="['(##) ####-####', '(##) #####-####']" 
                                              placeholder="Telefone" 
                                              id="telefone" 
                                              name="telefone" 
                                              v-model="telefone" 
                                              maxlength="14"
                                              class="form-control form-control-sm" :class="{ 'is-invalid': $v.telefone.$error }"
                                    />
                                    <div class="text-danger" v-if="$v.telefone.$error && !$v.telefone.required"><small>Campo obrigatório.</small></div>
                                </div>

                                <div class="form-group">
                                    <textarea placeholder="Mensagem" 
                                              name="mensagem" 
                                              id="mensagem" 
                                              cols="30" rows="10" 
                                              v-model="mensagem" 
                                              class="form-control form-control-sm" :class="{ 'is-invalid': $v.mensagem.$error }"
                                    ></textarea>
                                    <div class="text-danger" v-if="$v.mensagem.$error && !$v.mensagem.required"><small>Campo obrigatório.</small></div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="arquivo">
                                        <label class="custom-file-label" for="arquivo">Escolher arquivo</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-outline-primary btn-sm btn-block" @click="submit">Enviar!</button>
                                </div>
                    
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { alpha, required, email } from 'vuelidate/lib/validators'
    import {TheMask} from 'vue-the-mask'
    
    export default {
        components: {TheMask},
        data() {
            return {
                nome: "",
                email: "",
                telefone: "",
                mensagem: "",
                arquivo: null,
                errors: null,
            }
        },
        validations: {
            nome: {
                required,
                alpha,
            },
            email: {
                required,
                email
            },
            telefone: {
                required,
            },
            mensagem: {
                required
            }
        },
        methods: {
            submit(e) {
                this.errors = null
                e.preventDefault()
                this.$v.$touch()
                if (!this.$v.$invalid) {
                    axios.post('/api/contato', {
                        nome: this.nome,
                        email: this.email,
                        telefone: this.telefone,
                        mensagem: this.mensagem,
                        arquivo: this.arquivo, 
                    })
                    .then(() => {
                        this.$router.push('/')
                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors
                    })
                }
            }
        },
        mounted() {
        }
    }
</script>
