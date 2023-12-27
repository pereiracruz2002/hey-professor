<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Dashboard') }}
        </x-header>
    </x-slot>
    <div class="dark:text-gray-400 space-y-4">
        <x-container>
            <x-form :action="route('question.store')">
                <div class="mb-4">
                    <x-textarea label="Question" name="question">
                    </x-textarea>
                </div>
                <x-btn.primary>Save</x-btn.primary>
                <x-btn.reset>Cancel</x-btn.reset>
            </x-form>
            <hr class="border-grey-700 border-dashed my-4">
            <div class="dark:text-gray-400 uppercase font-bold mb-1">List of Question</div>
            <div class="dark-text-grey-400 space-y-4">
                @foreach ($questions as $item )
                    <x-question :question="$item" />
                @endforeach
            </div>
           
        </x-container>
    </div>
</x-app-layout>
