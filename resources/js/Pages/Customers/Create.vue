<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import TextareaInput from '@/Components/TextareaInput.vue';
import { Core as YubinBangoCore } from "yubinbango-core2"





const form = useForm({
    name: null,
    kana: null,
    tel: null,
    email: null,
    postcode: null,
    address: null,
    gender: 0,
    birthday: null,
    memo: null
})

const submit = () =>{
    form.post('/customers');
};



const fetchAddress = () => {  
    new YubinBangoCore(String(form.postcode), (value) => {
        //console.log(value)
        form.address = value.region + value.locality + value.street        
    })
}

</script>

<template>
    <Head title="顧客登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">顧客登録</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">

                            <form @submit.prevent="submit">
                                <div class="container px-5 py-6 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                        <div class="relative">
                                            <InputLabel for="name" class="leading-7 text-sm text-gray-600">顧客名</InputLabel>
                                            <TextInput type="text" id="name" name="name" v-model = "form.name" 
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none 
                                            text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            <InputError class="mt-2" :message="form.errors.name" />
                                        </div>
                                        </div>
                                        <div class="p-2 w-full">
                                        <div class="relative">
                                            <InputLabel for="kana" class="leading-7 text-sm text-gray-600">仮名</InputLabel>
                                            <TextInput type="text" id="kana" name="kana" v-model = "form.kana" 
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none 
                                            text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            <InputError class="mt-2" :message="form.errors.kana" />

                                        </div>
                                        </div>

                                        <div class="p-2 w-full">
                                        <div class="relative">
                                            <InputLabel for="tel" class="leading-7 text-sm text-gray-600">電話番号</InputLabel>
                                            <TextInput type="number" id="tel" name="tel" v-model = "form.tel" 
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none 
                                            text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            <InputError class="mt-2" :message="form.errors.tel" />

                                        </div>
                                        </div>

                                        <div class="p-2 w-full">
                                        <div class="relative">
                                            <InputLabel for="email" class="leading-7 text-sm text-gray-600">E-mail</InputLabel>
                                            <TextInput type="text" id="email" name="email" v-model = "form.email" 
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none 
                                            text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            <InputError class="mt-2" :message="form.errors.email" />
                                        </div>
                                        </div>

                                        <div class="p-2 w-full">
                                        <div class="relative">
                                            <InputLabel for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</InputLabel>
                                            <TextInput type="number" id="postcode" name="postcode" v-model = "form.postcode"
                                            class="w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none 
                                            text-gray-700 py-1 px-2 leading-8 transition-colors duration-200 ease-in-out" />
                                            <button type = "button" @click="fetchAddress" class="mx-1 w-1/3 text-white bg-gray-500 border-0 py-2 px-2  focus:outline-none hover:bg-gray-600 rounded text-lg">住所自動入力</button>
                                            <InputError class="mt-2" :message="form.errors.postcode" />
                                        </div>
                                        </div>
                                        
                                        <div class="p-2 w-full">
                                        <div class="relative">
                                            <InputLabel for="address" class="leading-7 text-sm text-gray-600">住所</InputLabel>
                                            <TextareaInput id="address" name="address" v-model = "form.address" 
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none 
                                            text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            <InputError class="mt-2" :message="form.errors.address" />
                                        </div>
                                        </div>
                                        <div class="p-2 w-1/2">
                                        <div class="relative">
                                            <InputLabel for="birthday" class="leading-7 text-sm text-gray-600">誕生日</InputLabel>
                                            <TextInput type="date" id="birthday" name="birthday" v-model = "form.birthday" 
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none 
                                            text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            <InputError class="mt-2" :message="form.errors.birthday" />
                                        </div>
                                        </div>
                                        <div class="p-2 w-full">
                                        <div class="relative">
                                            <InputLabel for="gender" class="leading-7 text-sm text-gray-600">性別</InputLabel>
                                            <input  type="radio" id="gender" name="gender" v-model = "form.gender" value = '2'/>
                                            <label class="ml-2 mr-4">男</label>
                                            <input  type="radio" id="gender" name="gender" v-model = "form.gender" value = '1'/>
                                            <label class="ml-2 mr-4">女</label>
                                            <input  type="radio" id="gender" name="gender" v-model = "form.gender" value = '0'/>
                                            <label class="ml-2 mr-4">指定なし</label>
                                        </div>
                                        </div>
                                       
                                        <div class="p-2 w-full">
                                        <div class="relative">
                                            <InputLabel for="memo" class="leading-7 text-sm text-gray-600">メモ</InputLabel>
                                            <TextareaInput id="memo" name="memo" v-model = "form.memo" 
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none 
                                            text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            <InputError class="mt-2" :message="form.errors.memo" />
                                        </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <button type="submit" :disabled="form.processing" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">顧客登録</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>


                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
