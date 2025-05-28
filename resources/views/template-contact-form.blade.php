{{--
  Template Name: Contact Form
--}}

@extends('layouts.app')

@section('content')
 
  <div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-blue-200 to-purple-400 relative pb-32">
    <div class="w-full rounded-lg bg-slate-900 p-10 text-sm text-indigo-300 sm:w-96 max-w-96 mt-18">
      <h1 class="mb-4 text-center text-3xl font-semibold text-white">Contact</h1>
      <p class="mb-6 text-center text-sm">Send your data</p>
      <form method="POST" action="{{ admin_url('admin-post.php') }}">

        @csrf
        <input type="hidden" name="action" value="custom_form_submission">

        <div class="mb-5 flex gap-3 rounded-full bg-[#333A5c] px-6 py-3">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4"><path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#64748b" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <input type="text" name="name" required placeholder="Name" class="border-none outline-none" />
        </div>
       
        <div class="mb-5 flex gap-3 rounded-full bg-[#333A5c] px-6 py-3">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4"><path d="M3 8L8.44992 11.6333C9.73295 12.4886 10.3745 12.9163 11.0678 13.0825C11.6806 13.2293 12.3194 13.2293 12.9322 13.0825C13.6255 12.9163 14.2671 12.4886 15.5501 11.6333L21 8M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z" stroke="#64748b" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          <input type="email" name="email" required placeholder="Email" class="border-none outline-none" />
        </div>

        <button type="submit" class="w-full rounded-full bg-gradient-to-r from-indigo-400 to-indigo-900 py-3 font-medium tracking-wide text-white cursor-pointer">Send</button>
      </form>
      
    </div>
  </div>
  
@endsection