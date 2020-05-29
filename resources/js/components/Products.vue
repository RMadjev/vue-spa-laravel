<template>
    <div class="columns products-list">
        <div class="column is-two-thirds">
            <table class="table">
                <thead>
                <tr>
                    <th><abbr title="Product name">Name</abbr></th>
                    <th><abbr title="Product price">Price</abbr></th>
                    <th class="has-text-centered">Actions</th>
                </tr>
                </thead>
                <tbody v-if="products.length > 0">
                <tr v-for="(product, index) in products">
                    <td v-text="product.name"></td>
                    <td v-text="product.price"></td>
                    <td class="has-text-centered">
                        <a @click="enterEditMode(index ,product)" class="icon">
                            <i class="far far fa-edit"></i>
                        </a>
                        <a @click="deleteProduct(index, product.id)" class="icon has-text-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                <tbody v-else>
                <tr>
                    <td class="has-text-centered" colspan="3">No products available</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="column">
            <label class="label">Add new product:</label>
            <form action="/product" method="post" @submit.prevent="onSubmit">
                <div class="field">
                    <div class="control">
                        <input class="input is-primary" type="text" name="name" placeholder="Name" v-model="name">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" name="price" placeholder="Price" v-model="price">
                    </div>
                </div>
                <button type="submit" class="button is-info">Add</button>
            </form>
        </div>

        <!--todo extract to sub component-->
        <div class="modal" v-bind:class="{ 'is-active': editMode }">>
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Edit product:</p>
                    <button class="delete" @click="closeEditMode()"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <div class="control">
                            <input class="input is-primary" type="text" name="name" placeholder="Name"
                                   v-model="edit_name">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" name="price" placeholder="Price" v-model="edit_price">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <div class="field">
                        <div class="control">
                            <button class="button is-link" @click="editProduct()">Edit</button>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data: function () {
            return {
                products: [],
                name: '',
                price: null,
                editMode: false,
                edit_name: '',
                edit_price: null,
                edit_id: null,
                edit_index: null
            }
        },
        created() {
            axios.get('/products').then(({data}) => {
                this.products = data;
            });
        },
        methods: {
            onSubmit() {
                axios.post('/products', {'name': this.name, 'price': this.price}).then(({data}) => {
                    this.name = '';
                    this.price = null;
                    this.edit_id = null;
                    this.edit_index = null;
                    this.products.push(data)
                });
            },

            deleteProduct(index, product_id) {
                axios.delete('/products/' + product_id).then(response => {
                    this.$delete(this.products, index);
                });
            },

            editProduct() {
                axios.put(`/products/${this.edit_id}`, {
                    'name': this.edit_name,
                    'price': this.edit_price
                }).then(response => {
                        this.products[this.edit_index].price = this.edit_price;
                        this.products[this.edit_index].name = this.edit_name;
                        this.closeEditMode();
                    }
                );
            },

            enterEditMode(index, product) {
                this.editMode = true;
                this.edit_name = product.name;
                this.edit_price = product.price;
                this.edit_id = product.id;
                this.edit_index = index;
            },

            closeEditMode() {
                this.edit_name = '';
                this.edit_price = null;
                this.edit_id = null;
                this.edit_index = null;
                this.editMode = false;
            }
        }
    }
</script>
