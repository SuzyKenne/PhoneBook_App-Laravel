
<!-- Main content area would go here -->
<div class="contact-list">
    <div class="header">
        <h1>Contacts</h1>
        <div class="search-sort">
            <div class="search-container">
                <img class="search-icons" src='icons/ic_baseline-search.png' alt="">
                <input type="text" placeholder="Search...">
            </div>
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
                        <a href="{{ route('contacts.show', $contact->id) }}">
                           <img  src="{{ asset('images/'. $contact->image )}}" alt="{{ $contact->name }}" class="contact-avatar">
                         {{ $contact->name }} 
                        </a>                        
                    </td>
                    <td>{{ $contact->number }}</td>
                    <td>{{ $contact->email }}</td>
                </tr> 
            @endforeach                    
        </tbody>
    </table>
</div>