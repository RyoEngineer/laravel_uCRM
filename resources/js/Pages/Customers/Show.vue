<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { nl2br } from '@/common'
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    customer: Object
})
const deletecustomer = id => {
    Inertia.delete(route('customers.destroy', {customer:id}),{
        onBefore: () => confirm("本当に削除しますか？")
    })
}
</script>

<template>
    <Head title="顧客詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">顧客詳細</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">
                                <div class="container px-5 py-6 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <table>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">顧客名: </td>
                                                <td>{{ customer.name }}</td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">仮名: </td>
                                                <td>{{ customer.kana }}</td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">電話番号: </td>
                                                <td>{{ customer.tel }}</td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">E-Mail: </td>
                                                <td>{{ customer.email }}</td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">郵便番号: </td>
                                                <td>{{ customer.postcode }}</td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">住所: </td>
                                                <td v-html="nl2br(customer.address)" ></td>

                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">誕生日: </td>
                                                <td>{{ customer.birthday }}</td>
                                            </tr> 
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">性別: </td>
                                                <td v-if="customer.gender === 0">指定なし</td>
                                                <td v-if="customer.gender === 1">男</td>
                                                <td v-if="customer.gender === 2">女</td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">メモ: </td>
                                                <td v-html="nl2br(customer.memo)" ></td>
                                            </tr>
                                        </table>
                                        <div class="p-2 w-full">
                                            <button @click= "deletecustomer(customer.id)"  class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">削除</button>
                                        </div>                                        
                                    </div>
                                    </div> 
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
