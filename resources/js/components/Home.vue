<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-red-300 text-white font-bold">List of Product</div>
                    <div class="card-body">
                        <table class="table-auto items-center">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Price (RM)</th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="Object.keys(products).length > 0">
                                <tr :key="product.id" v-for="(product, index) in products">
                                    <td class="border px-4 py-2">{{ index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ product.name }}</td>
                                    <td class="border px-4 py-2">{{ product.price }}</td>
                                    <td class="border px-4 py-2">
                                       <button class="bg-blue-500 hover:bg-red-300 text-white font-bold py-2 px-4 border border-blue-700 rounded" @click="addToCart">
                                           Add to cart
                                        </button>
                                    </td>
                                </tr>
                                </template>
                                <template v-if="Object.keys(products).length == 0">
                                    <tr class="text-center">
                                        <td colspan="5"><div class="alert-warning p-2">No Record ..</div></td>
                                    </tr>                     
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: []
        };
    },
    created() {
        axios
            .get("/")
            .then(res => {
                this.products = res.data[0];
                // console.log(res.data[0]);
            })
            .catch(err => console.log(err));
    },
    methods:{
        addToCart(){
            alert('Product have been added')
        }
    }
};
</script>
