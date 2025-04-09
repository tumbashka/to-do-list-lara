@props([
    'name' => null,
    'description' => null,
    'deadline' => null,
])
<div>
    <x-form.input-float
        :name="'name'"
        :value="$name"
        :text="'Заголовок'"
    />
    <x-form.textarea-float
        :name="'description'"
        :value="$description"
        :text="'Описание'"
    />
    <x-form.input-float
        :type="'date'"
        :name="'deadline'"
        :value="$deadline"
        :text="'Дедлайн'"
    />
</div>
