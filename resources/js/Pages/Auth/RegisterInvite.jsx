import React from 'react'
import { useForm } from '@inertiajs/react'

export default function RegisterInvite({ invite }) {
  const { data, setData, post, processing, errors } = useForm({
    name: '',
    password: '',
    password_confirmation: '',
  })

  function submit(e) {
    e.preventDefault()
    post(route('invite.register', invite.token))
  }

  return (
    <div className="flex items-center justify-center min-h-screen bg-gray-100">
      <div className="bg-white rounded-xl shadow p-8 w-full max-w-md">
        <h1 className="text-2xl font-bold text-center mb-6 text-green-600">📩 Complete Registration</h1>
        <p className="text-center mb-4 text-gray-600">Invitation for <b>{invite.email}</b></p>

        <form onSubmit={submit} className="space-y-4">
          <input type="text" value={data.name}
            onChange={e => setData('name', e.target.value)}
            placeholder="Full name"
            className="w-full border rounded p-2" />
          {errors.name && <div className="text-red-500 text-sm">{errors.name}</div>}

          <input type="password" value={data.password}
            onChange={e => setData('password', e.target.value)}
            placeholder="Password"
            className="w-full border rounded p-2" />
          {errors.password && <div className="text-red-500 text-sm">{errors.password}</div>}

          <input type="password" value={data.password_confirmation}
            onChange={e => setData('password_confirmation', e.target.value)}
            placeholder="Confirm Password"
            className="w-full border rounded p-2" />

          <button disabled={processing}
            className="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
            Register
          </button>
        </form>
      </div>
    </div>
  )
}
