<x-layout.page :title="$page->title">

    <section>
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">

            <s:user:login_form redirect="/docs/getting-started/requirements">
                <div class="[ flex flex-col gap-6 ]">
                    @if ($errors)
                        <div class="bg-red-300 text-white p-2">
                        @foreach ($errors as $error)
                            {{ $error }}<br>
                        @endforeach
                        </div>
                    @endif

                    @if ($success)
                        <div class="bg-green-300 text-white p-2">
                        {{ $success }}<br>
                        </div>
                    @endif

                    <div class="[ flex flex-col gap-2 ]">
                        <label>Email</label>
                        <input class="[ border p-2 ]" type="email" name="email" value="{{ old('email') }}" />
                    </div>

                    <div class="[ flex flex-col gap-2 ]">
                        <label>Password</label>
                        <input class="[ border p-2 ]" type="password" name="password" value="{{ old('password') }}" />
                    </div>

                    <button class="[ bg-gray-200 p-2 w-full ]" type="submit">Log in</button>
                </div>
            </s:user:login_form>

        </div>
    </section>

</x-layout.page>