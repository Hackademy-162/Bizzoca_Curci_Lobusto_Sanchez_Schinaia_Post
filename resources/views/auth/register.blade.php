<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1>Registrati</h1>
            </div>
        </div>
    </div>
    <div class="container my-5 vh-100">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{route('register')}}" class="card pt-5 shadow">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome Utente</label>
                        <input type="text" class="form-control" id="name"  name="name" value="{{ old('name') }}">
                        @error('name') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Indirizzo email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"> Conferma Password</label>
                        <input type="password" class="form-control" id="Password1" name="password_confirmation" >
                    </div>
                    <button type="submit" class="btn btn-primary">Crea profilo</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>