@php
    $id = $getId() ?: $getDefaultId('checkbox');
    $label = $getLabel();
    $checked = $getChecked();
    $errorMessage = $getErrorMessage($errors);
    $validationClass = $getValidationClass($errors);
    $isWired = $componentIsWired();
@endphp
<div @class(['form-check', 'mb-3' => $marginBottom])>
    <input {{ $attributes->merge([
        'wire:model' . $getComponentLivewireModifier() => $hasStandardLivewireModelBinding() ? null : $name,
        'id' => $id,
        'class' => 'form-check-input' . ($validationClass ? ' ' . $validationClass : null),
        'name' => $isWired ? null : $name,
        'aria-describedby' => $caption ? $id . '-caption' : null,
        'checked' => $isWired ? null : $checked
    ]) }} type="checkbox">
    <x-form::partials.label :id="$id" class="form-check-label" :label="$label"/>
    <x-form::partials.caption :inputId="$id" :caption="$caption"/>
    <x-form::partials.error-message :message="$errorMessage"/>
</div>
