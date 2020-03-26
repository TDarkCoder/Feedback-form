<template>
    <section class="text-center my-5 justify-content-center row mx-0">
        <div v-show="success" class="alert alert-success col-md-6 col-12">
            <span>Запрос отправлен успешно!</span>
        </div>
        <div v-show="error" class="alert alert-danger col-md-6 col-12">
            <span>Заполните форму полностью!</span>
        </div>
        <div class="col-12 text-center mb-4">
            <h4>Форма обратной связи</h4>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Имя:</label>
                <input id="name" v-model="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона:</label>
                <input id="phone" v-model="phone" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="message">Сообщение:</label>
                <textarea id="message" v-model="message" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="storage">Куда отправить заявку</label>
                <select id="storage" v-model="storage" class="form-control">
                    <option value="">Выбрать</option>
                    <option value="database">База данных</option>
                    <option value="text">Текстовый файл</option>
                </select>
            </div>
            <div class="form-group text-center">
                <button @click="submit" class="btn btn-success" type="button">Отправить</button>
            </div>
        </div>
    </section>
</template>

<script>

    export default {

        name: "Blank",

        data(){

            return{
                name:'',
                phone:'',
                message:'',
                storage:'',
                error:false,
                success:false
            }

        },

        watch:{

            phone(){
                this.phone = this.phone.replace(/[^0-9]/g, '');
                return this.phone = (this.phone[0] !== '+' && this.phone.length > 0) ? `+${this.phone}` : this.phone;
            }

        },

        methods:{

            validate(){
                return this.error = (this.name.trim() === '' || this.phone.trim() === '' || this.message.trim() === '' || this.storage === '');
            },

            submit(){

                if(!this.validate()){
                    axios.post('/feedback/store', {
                        name: this.name,
                        phone: this.phone,
                        message: this.message,
                        storage: this.storage,
                    })
                    .then((response) => {
                        this.name = this.phone = this.message = this.storage = '';
                        return this.success = response.data;
                    });
                }

            }

        }

    }

</script>

<style scoped>

</style>
