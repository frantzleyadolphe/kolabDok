import React from 'react';
import { Link, useForm } from '@inertiajs/react';

export default function Dashboard({ members }) {
  const { data, setData, post, processing } = useForm({ email: '' });

  function submit(e) {
    e.preventDefault();
    post(route('admin.invite'));
  }

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
      {/* Members list */}
      <div className="bg-white rounded-xl shadow p-6">
        <h2 className="text-lg font-semibold mb-4">👥 Organization Members</h2>
        <ul className="space-y-2">
          {members.map(m => (
            <li key={m.id} className="flex justify-between border-b pb-2">
              <span>{m.name} ({m.email})</span>
              <span className="text-sm text-gray-500">{m.role}</span>
            </li>
          ))}
        </ul>
      </div>

      {/* Invite form */}
      <div className="bg-white rounded-xl shadow p-6">
        <h2 className="text-lg font-semibold mb-4">✉️ Invite Member</h2>
        <form onSubmit={submit} className="space-y-3">
          <input
            type="email"
            value={data.email}
            onChange={e => setData('email', e.target.value)}
            className="w-full border rounded p-2"
            placeholder="Member email..."
          />
          <button disabled={processing}
            className="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
            Send Invitation
          </button>
        </form>
      </div>
    </div>
  );
}
