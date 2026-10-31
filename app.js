console.log("Javascript berhasil dimuat");

const toggleButton = document.querySelector("#toggleTips");
const formTips = document.querySelector("#formTips");
const customerForm = document.querySelector("#customerForm");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const numberInput = document.querySelector("#number");
const nikInput = document.querySelector("#nik");
const addressInput = document.querySelector("#address");
const provinceInput = document.querySelector("#province");
const cityInput = document.querySelector("#city");
const postalCodeInput = document.querySelector("#postal_code");
const birthPlaceInput = document.querySelector("#birth_place");
const birthDateInput = document.querySelector("#birth_date");
const parentNameInput = document.querySelector("#parent_name");

const nameFeedback = document.querySelector("#nameFeedback");
const emailFeedback = document.querySelector("#emailFeedback");
const numberFeedback = document.querySelector("#numberFeedback");
const nikFeedback = document.querySelector("#nikFeedback");
const addressFeedback = document.querySelector("#addressFeedback");
const provinceFeedback = document.querySelector("#provinceFeedback");
const cityFeedback = document.querySelector("#cityFeedback");
const postalCodeFeedback = document.querySelector("#postalCodeFeedback");
const birthPlaceFeedback = document.querySelector("#birthPlaceFeedback");
const birthDateFeedback = document.querySelector("#birthDateFeedback");
const parentNameFeedback = document.querySelector("#parentNameFeedback");
const formMessage = document.querySelector("#formMessage");

toggleButton.addEventListener("click", function(){
    formTips.hidden = !formTips.hidden;
//jika form tips atribut hiddennya true maka text nya tulis tampilkan petunjuk, jika sebaliknya
// jika sebaliknya tampilkan sembbunyikan petunjuk
    toggleButton.textContent = formTips.hidden ? "Tampilkan Petunjuk" : "sembunyikan Petunjuk";

});
nameInput.addEventListener("input", function(){
    if(nameInput.value.trim() === ""){
        nameFeedback.textContent = "nama belum diisi";

    }else{
        nameFeedback.textContent = "Nama sudah diisi."

    }
});

emailInput.addEventListener("input", function(){
    if(emailInput.value.trim() === ""){
        emailFeedback.textContent = "email belum diisi";
    }else if(!emailInput.validity.valid){
        emailFeedback.textContent = "Periksa Format email";
    }else{
        emailFeedback.textContent = "Format Email Valid";
    }
});
numberInput.addEventListener("input", function(){
    if(numberInput.value.trim() === ""){
        numberFeedback.textContent = "nomor belum diisi";
    }else if(!numberInput.validity.valid){
        numberFeedback.textContent = "Periksa Format nomor";
    }else{
        numberFeedback.textContent = "Format nomor Valid";
    }
});
nikInput.addEventListener("input", function(){
    if(nikInput.value.trim() === ""){
        nikFeedback.textContent = "NIK belum diisi";
    }else{
        nikFeedback.textContent = "Format NIK Valid";
    }
});

addressInput.addEventListener("input", function(){
    if(addressInput.value.trim() === ""){
        addressFeedback.textContent = "alamat belum diisi";
    }else{
        addressFeedback.textContent = "Alamat sudah diisi.";
    }
});

provinceInput.addEventListener("change", function(){
    if(provinceInput.value === ""){
        provinceFeedback.textContent = "provinsi belum dipilih";
    }else{
        provinceFeedback.textContent = "Provinsi sudah dipilih.";
    }
});

cityInput.addEventListener("change", function(){
    if(cityInput.value === ""){
        cityFeedback.textContent = "kota/kabupaten belum dipilih";
    }else{
        cityFeedback.textContent = "Kota/Kabupaten sudah dipilih.";
    }
});

postalCodeInput.addEventListener("input", function(){
    if(postalCodeInput.value.trim() === ""){
        postalCodeFeedback.textContent = "kode POS belum diisi";
    }else{
        postalCodeFeedback.textContent = "Format Kode POS Valid";
    }
});

birthPlaceInput.addEventListener("input", function(){
    if(birthPlaceInput.value.trim() === ""){
        birthPlaceFeedback.textContent = "tempat lahir belum diisi";
    }else if(!namePattern.test(birthPlaceInput.value.trim())){
        birthPlaceFeedback.textContent = "Tempat lahir hanya boleh huruf";
    }else{
        birthPlaceFeedback.textContent = "Tempat lahir sudah diisi.";
    }
});

birthDateInput.addEventListener("input", function(){
    if(birthDateInput.value === ""){
        birthDateFeedback.textContent = "tanggal lahir belum diisi";
    }else if(!isValidBirthDate(birthDateInput.value)){
        birthDateFeedback.textContent = "Tanggal lahir tidak valid";
    }else{
        birthDateFeedback.textContent = "Tanggal lahir valid";
    }
});

parentNameInput.addEventListener("input", function(){
    if(parentNameInput.value.trim() === ""){
        parentNameFeedback.textContent = "nama orang tua belum diisi";
    }else if(!namePattern.test(parentNameInput.value.trim())){
        parentNameFeedback.textContent = "Nama orang tua hanya boleh huruf";
    }else{
        parentNameFeedback.textContent = "Nama orang tua sudah diisi.";
    }
});

customerForm.addEventListener("submit", function(event) {
    let hasError = false;

    nameFeedback.textContent = "";
    emailFeedback.textContent = "";
    numberFeedback.textContent = "";
    formMessage.textContent = "";
    nikFeedback.textContent = "";
    addressFeedback.textContent = "";
    provinceFeedback.textContent = "";
    cityFeedback.textContent = "";
    postalCodeFeedback.textContent = "";
    birthPlaceFeedback.textContent = "";
    birthDateFeedback.textContent = "";
    parentNameFeedback.textContent = "";
    formMessage.textContent = "";


    if(nameInput.value.trim() == ""){
        event.preventDefault();
        nameFeedback.textContent = "nama wajib diisi";
        hasError = true;

    }
    if(emailInput.value.trim() == "" || !emailInput.validity.valid){
        event.preventDefault();
        emailFeedback.textContent = "email wajib diisi dan pastikan formatnya benar";
        hasError = true;
        
    }
    if(numberInput.value.trim() == ""|| !numberInput.validity.valid){
        event.preventDefault();
        numberFeedback.textContent = "nomor wajib diisi";
        hasError = true;

    }
    if(!/^\d{16}$/.test(nikInput.value.trim())){
        nikFeedback.textContent = "NIK wajib diisi dengan 16 digit angka";
        hasError = true;
    }
    if(addressInput.value.trim().length < 10){
        addressFeedback.textContent = "alamat wajib diisi lengkap (minimal 10 karakter)";
        hasError = true;
    }
    if(provinceInput.value === ""){
        provinceFeedback.textContent = "provinsi wajib dipilih";
        hasError = true;
    }
    if(cityInput.value === ""){
        cityFeedback.textContent = "kota/kabupaten wajib dipilih";
        hasError = true;
    }
    if(postalCodeInput.value.trim() == "" || !postalCodeInput.validity.valid){
        event.preventDefault();
        postalCodeFeedback.textContent = "kode POS wajib diisi dengan 5 digit angka";
        hasError = true;
    }
    if(birthPlaceInput.value.trim() == ""){
        birthPlaceFeedback.textContent = "tempat lahir wajib diisi (hanya huruf)";
        hasError = true;
    }
    if(!isValidBirthDate(birthDateInput.value)){
        birthDateFeedback.textContent = "tanggal lahir wajib diisi dengan tanggal yang valid";
        hasError = true;
    }
    if(parentNameInput.value.trim() == ""){
        parentNameFeedback.textContent = "nama orang tua wajib diisi (hanya huruf)";
        hasError = true;
    }

    if(hasError){
        formMessage.textContent = "perbaiki input yang masih salah";

    }else{
        formMessage.textContent = "Data sudah bisa diproses";
    }
});

// tabmahin 1 inputan yaitu nomor telpnya
//index, submit,customer, success