<template>
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">

                    <div class="text-center mb-6">
                        <img
                                src="https://tabler.github.io/tabler/demo/brand/tabler.svg"
                                class="h-6"
                                alt="Logo Tabler">
                    </div>

                    <form class="card"
                          method="post"
                          novalidate
                          @submit.prevent="login">

                        <div class="card-body p-6">
                            <div class="card-title">Login to your account</div>

                            <div class="form-group">
                                <label class="form-label"
                                       for="email">E-Mail Address</label>
                                <input type="email"
                                       class="form-control"
                                       :class="form.errors.has('email') ? 'is-invalid' : ''"
                                       id="email"
                                       aria-describedby="emailHelp"
                                       placeholder="Enter email"
                                       required
                                       v-model="loginForm.email"
                                       autofocus>
                                <span v-if="form.errors.has('email')"
                                      class="invalid-feedback">
                                    <strong>{{ form.errors.get('email') }}</strong>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Password
                                    <a href="#"
                                       class="float-right small">
                                        I forgot my password
                                    </a>
                                </label>
                                <input type="password"
                                       class="form-control"
                                       :class="form.errors.has('password') ? 'is-invalid' : ''"
                                       id="password"
                                       v-model="loginForm.password"
                                       placeholder="Password">
                                <span v-if="form.errors.has('password')"
                                      class="invalid-feedback">
                                    <strong>{{ form.errors.get('password') }}</strong>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           v-model="loginForm.remember">

                                    <span class="custom-control-label">Remember me</span>
                                </label>
                            </div>

                            <div class="form-footer">
                                <button type="submit"
                                        :disabled="form.isPending"
                                        class="btn btn-primary btn-block">Sign in
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class="text-center text-muted">
                        Don't have an account yet? <a href="#">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Form from 'form-object';

    export default {
        data: function () {
            return {
                loginForm: {
                    email: '',
                    password: '',
                    remember: false
                },
                form: new Form
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            login() {
                this.form.post(route('login'), this.loginForm)
                    .then((response) => {
                        Form.defaults.axios.defaults.headers.common["X-CSRF-TOKEN"] = response.csrfToken;
                        window.location = '/';
                    })
            }
        }
    }
</script>
