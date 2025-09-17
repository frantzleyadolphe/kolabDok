import React from 'react'
import { useForm } from '@inertiajs/react'

export default function Login() {
  const { data, setData, post, processing, errors } = useForm({
    email: '',
    password: '',
  })

  function submit(e) {
    e.preventDefault()
    post(route('login'))
  }

  return (
    <div className="flex items-center justify-center min-h-screen bg-gray-100">
      <div className="bg-white rounded-xl shadow p-8 w-full max-w-md">
        <h1 className="text-2xl font-bold text-center mb-6 text-indigo-600">🔐 Login</h1>
        <form onSubmit={submit} className="space-y-4">
          <input type="email" value={data.email}
            onChange={e => setData('email', e.target.value)}
            placeholder="Email"
            className="w-full border rounded p-2" />
          {errors.email && <div className="text-red-500 text-sm">{errors.email}</div>}

          <input type="password" value={data.password}
            onChange={e => setData('password', e.target.value)}
            placeholder="Password"
            className="w-full border rounded p-2" />
          {errors.password && <div className="text-red-500 text-sm">{errors.password}</div>}

          <button disabled={processing}
            className="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
            Login
          </button>
        </form>
      </div>
    </div>
  )
}
