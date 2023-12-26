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
        </x-container>
    </div>
</x-app-layout>
