<template>
    <h3>Users </h3>

    <ag-grid-vue :rowData="usersData" :columnDefs="usersCols" style="height: 500px ; width:100%" class="ag-theme-quartz">
    </ag-grid-vue>
</template>


<script setup>
import { ref, onMounted } from 'vue';
import "ag-grid-community/styles/ag-grid.css"; 
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridVue } from "ag-grid-vue3"; 
import UserRepository from '../../js/Services/UserRepository';

const usersData = ref([

]);

const usersCols = ref([
    { field: "id" },
    { field: "name" },
    { field: "email" },
    {
        field: "avatar",
        headerName: "Avatar",
        cellRenderer: params => `<img src="${params.value}" alt="Avatar" style="height: 50px; width: 50px;" />`,
    },    { field: "skills" }
]);
onMounted(() => {
    UserRepository.users({}).then(res => {

        usersData.value = res.data.payload

    }).catch(err => console.log("err while fetching data", err))
})

</script>