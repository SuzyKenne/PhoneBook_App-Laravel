
<!-- Main content area would go here -->
<div class="contact-list">
    <div class="header">
        <h1>Contacts</h1>
        <div class="search-sort">
            <form action="{{ url('/') }}" method="GET" class="search-container">
                <img class="search-icons" src="{{ asset('icons/ic_baseline-search.png') }}" alt="Search">
                <input type="text" name="query" placeholder="Search..." value="{{ $query ?? '' }}">
                <button type="submit" style="display:none;"></button>
            </form>
            <form action="{{ url('/') }}" method="GET">
                <select name="sort" onchange="this.form.submit()">
                    <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Sort by: A-Z</option>
                    <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Sort by: Z-A</option>
                </select>
            </form>
        </div>   
    </div>            
    <table>
        <thead class="table-header">
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody class="table-info">
            @foreach ($contacts as $contact)
                <tr>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}" class="contact">
                           <img  src="{{ asset('images/'. $contact->image )}}" alt="{{ $contact->name }}" class="contact-avatar">
                         {{ $contact->name }} 
                        </a>                        
                    </td>
                    <td>{{ $contact->number }}</td>
                    <td>{{ $contact->email }}</td>
                </tr> 
            @endforeach  
            @if($contacts->isEmpty())
                <p>No contacts found.</p>
            @endif                  
        </tbody>
    </table>
</div>