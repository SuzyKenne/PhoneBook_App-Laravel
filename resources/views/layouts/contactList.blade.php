
<!-- Main content area would go here -->
<div class="contact-list">
    <div class="header">
        <h1>Contacts</h1>
        <div class="search-sort">
            <div class="search-container">
                <img class="search-icons" src='icons/ic_baseline-search.png' alt="">
                <input type="text" placeholder="Search...">
            </div>
            <select>
                <option>Sort by: A-Z</option>
                <option>Sort by: Z-A</option>
            </select>
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
                    <td><img  src="{{ $contact->image }}" alt="{{ $contact->name }}" class="contact-avatar">{{ $contact->name }}</td>
                    <td>{{ $contact->number }}</td>
                    <td>{{ $contact->email }}</td>
                </tr> 
            @endforeach                    
        </tbody>
    </table>
</div>