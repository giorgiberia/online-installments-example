Vue.use(VueResource);
Vue.use(VueFormular, {
    messages: {
        required: ':field-(ი)ს შევსება აუცილებელია'
    }
});

var store = {
    relStatus: [{
        value: 'დაოჯახებული',
        text: 'დაოჯახებული'
    }, {
        value: 'დასაოჯახებელი',
        text: 'დასაოჯახებელი'
    }, {
        value: 'განქორწინებული',
        text: 'განქორწინებული'
    }, {
        value: 'ქვრივი',
        text: 'ქვრივი'
    }],

    idTypes: [{
        value: 'პირადობის მოწმობა',
        text: 'პირადობის მოწმობა'
    }, {
        value: 'პასპორტი',
        text: 'პასპორტი'
    }, {
        value: 'ID ბარათი',
        text: 'ID ბარათი'
    }],

    sexTypes: [{
        value: 'მამრობითი',
        text: 'მამრობითი'
    }, {
        value: 'მდედრობითი',
        text: 'მდედრობითი'
    }],

    banksList: [{
        value: 'არ ირიცხება ბანკში',
        text: 'არ ირიცხება ბანკში'
    }, {
        value: 'სს საქართველოს ბანკი',
        text: 'სს საქართველოს ბანკი'
    }, {
        value: 'სს თიბისი ბანკი',
        text: 'სს თიბისი ბანკი'
    }, {
        value: 'სს ლიბერთი ბანკი',
        text: 'სს ლიბერთი ბანკი'
    }, {
        value: 'სს პროკრედიტ ბანკი',
        text: 'სს პროკრედიტ ბანკი'
    }, {
        value: 'სს ბანკი რესპუბლიკა',
        text: 'სს ბანკი რესპუბლიკა'
    }, {
        value: 'სს ბანკი ქართუ',
        text: 'სს ბანკი ქართუ'
    }, {
        value: 'სს ბაზის ბანკი',
        text: 'სს ბაზის ბანკი'
    }, {
        value: 'სს ვითიბი ბანკი',
        text: 'სს ვითიბი ბანკი'
    }, {
        value: 'სს ზირაათ ბანკი',
        text: 'სს ზირაათ ბანკი'
    }, {
        value: 'სს პირველი ბრიტანული ბანკი',
        text: 'სს პირველი ბრიტანული ბანკი'
    }, {
        value: 'სს აგროინვესტბანკი',
        text: 'სს აგროინვესტბანკი'
    }, {
        value: 'სს კავკასიის განვითარების ბანკი',
        text: 'სს კავკასიის განვითარების ბანკი'
    }, {
        value: 'სს ინვესტ ბანკი',
        text: 'სს ინვესტ ბანკი'
    }, {
        value: 'სს ბტა ბანკი',
        text: 'სს ბტა ბანკი'
    }, {
        value: 'სს ტაოპრივატ ბანკი',
        text: 'სს ტაოპრივატ ბანკი'
    }, {
        value: 'სხვა',
        text: 'სხვა'
    }]
}

new Vue({
    el: '#app',

    data: {
        actionUrl: 'submit.php',

        formSubmitted: false,

        submissionError: false,

        daterangeOptions: {
            showDropdowns: true
        },

        validation: {
            rules: {
                // product name
                'entry.000000001': {
                    required: true
                },
                // product price
                'entry.000000002': {
                    required: true
                },
                // სახელი
                'entry.000000003': {
                    required: true
                },
                // გვარი
                'entry.000000004': {
                    required: true
                },
                // მამის სახელი
                'entry.000000005': {
                    required: true
                },
                // დაბადების თარიღი
                'entry.000000006': {
                    required: true,
                    isDate: true
                },
                // დაბადების ადგილი რეგისტრაციის მიხედვით
                'entry.000000007': {
                    required: true
                },
                // პირადობის დამადასტურებული დოკუმენტის ტიპი
                'entry.000000008': {
                    required: true
                },
                // პირადი ნომერი
                'entry.000000009': {
                    required: true
                },
                // საბუთის ნომერი
                'entry.000000010': {
                    required: true
                },
                // პირადობის დამადასტურებელი დოკუმენტის გაცემის თარიღი
                'entry.000000011': {
                    required: true,
                    isDate: true
                },
                // გამცემი ორგანო
                'entry.000000012': {
                    required: true
                },
                // მოქმედების ვადა
                'entry.000000013': {
                    required: true,
                    isDate: true
                },
                // მობილურის ნომერი
                'entry.000000014': {
                    required: true
                },
                // სახლის ტელეფონის ნომერი
                'entry.000000015': {
                    required: true
                },
                // ელფოსტა
                'entry.000000016': {
                    required: false
                },
                // იურიდიული მისამართი
                'entry.000000017': {
                    required: true
                },
                // ფაქტიური მისამართი
                'entry.000000018': {
                    required: true
                },
                // ფაქტიურ მისამართზე ცხოვრების დრო (წელი)
                'entry.000000019': {
                    required: true
                },
                // ოჯახის საშუალო თვიური ხარჯი (ლარი)
                'entry.000000020': {
                    required: true
                },
                // ოჯახის წევრების რაოდენობა
                'entry.000000021': {
                    required: true
                },
                // საკონტაქტო ოჯახის წევრი, ნათესაური კავშირის ტიპი და მისი მობილურის ნომერი
                'entry.000000022': {
                    required: true
                },
                // ოჯახური მდგომარეობა
                'entry.000000023': {
                    required: true
                },
                // ბავშვების რაოდენობა
                'entry.000000024': {
                    required: true,
                    requiredIf: 'entry.000000023:'
                        + store.relStatus[0].value + ','
                        + store.relStatus[2].value + ','
                        + store.relStatus[3].value
                },
                // სქესი
                'entry.000000025': {
                    required: true
                },
                // განათლება
                'entry.000000026': {
                    required: true
                },
                // სასურველი გადახდის რიცხვი
                'entry.000000027': {
                    required: true
                },
                // სასურველი განვადების ხანგრძლივობა (თვე)
                'entry.000000028': {
                    required: true
                },
                // კოდური სიტყვა
                'entry.000000029': {
                    required: true
                },
                // ორგანიზაციის დასახელება
                'entry.000000030': {
                    required: true
                },
                // ორგანიზაციის საქმიანობის სფერო
                'entry.000000031': {
                    required: true
                },
                // ორგანიზაციის მისამართი
                'entry.000000032': {
                    required: true
                },
                // ორგანიზაციის ტელ. ნომერი
                'entry.000000033': {
                    required: true
                },
                // დაკავებული თანამდებობა
                'entry.000000034': {
                    required: true
                },
                // მუშაობის ხანგრძლივობა (თვე)
                'entry.000000035': {
                    required: true
                },
                // უშუალო ხელმძღვანელი (სახელი, გვარი) და მისი თანამდებობა
                'entry.000000036': {
                    required: true
                },
                // უშუალო ხელმძღვანელის ტელეფონი
                'entry.000000037': {
                    required: true
                },
                // ყოველთვიური ხელზე ასაღები ხელფასი (ლარი)
                'entry.000000038': {
                    required: true
                },
                // მომსახურე ბანკი
                'entry.000000039': {
                    required: true
                },
                // დამატებითი ინფორმაცია შემოსავლების შესახებ
                'entry.000000040': {
                    required: false
                }
            }
        },

        idTypes: store.idTypes,
        relStatus: store.relStatus,
        sexTypes: store.sexTypes,
        banksList: store.banksList
    },

    events: {
        'vue-formular.sent': function (data) {
            // look for date fields and convert them to acceptable format for google forms
            var self = this;
            $.each(data, function(index, value) {
                if (self.validation.rules[index] && self.validation.rules[index].isDate && moment(value).isValid()) {
                    data[index] = moment(value).format('YYYY-MM-DD');
                }
            });

            this.$http.post(this.actionUrl, data, {
                emulateJSON: true
            }).then(function () {
                self.submissionError = false;
                self.formSubmitted = true;
            }, function () {
                self.submissionError = true;
                self.formSubmitted = true;
            });
        }
    },

    methods: {
        tryAgain: function() {
            this.submissionError = false;
            this.formSubmitted = false;
        }
    }
});