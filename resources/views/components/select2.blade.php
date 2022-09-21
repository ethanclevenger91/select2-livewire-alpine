<div
    wire:key="something-unique"
    wire:ignore
    x-data="{
        multiple: {{ $multiple ? 'true' : 'false' }},
        value: @entangle($attributes->wire('model')),
        options: @js($options),
        init() {
            let bootSelect2 = () => {
                $(this.$refs.select).select2({
                    multiple: this.multiple,
                    data: this.options.map((i) => formatItem(i)),
                    containerCssClass: 'w-full',
                })
            }

            let formatItem = (i) => {
                let selections = this.multiple ? this.value : [this.value]

                if(i.children) {
                    return {
                        text: i.label,
                        children: i.children.map((j) => {
                            return formatItem(j);
                        })
                    };
                } else {
                    return {
                        id: i.value,
                        text: i.label,
                        selected: selections.map(i => String(i)).includes(String(i.value)),
                    }
                }
            }

            let refreshSelect2 = () => {
                console.log(this.$refs.select);
                $(this.$refs.select).select2('destroy')
                this.$refs.select.innerHTML = ''
                bootSelect2()
            }

            bootSelect2()

            $(this.$refs.select).on('change', () => {
                let currentSelection = $(this.$refs.select).select2('data')
                this.value = this.multiple
                    ? currentSelection.map(i => i.id)
                    : currentSelection[0].id
            })

            this.$watch('value', () => refreshSelect2())
            this.$watch('options', () => refreshSelect2())
        },
    }">
    <select
        x-ref="select"
        {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => '']) }}
    >
    </select>
</div>
