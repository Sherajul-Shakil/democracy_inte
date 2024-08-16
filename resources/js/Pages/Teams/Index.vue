<template>
    <div>
        <h1>Team List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="team in teams" :key="team.id">
                    <td>{{ team.id }}</td>
                    <td>{{ team.name }}</td>
                </tr>
            </tbody>
        </table>
        <Link href="/teams/create">Add New Team</Link>
        <div>
            <Link type="button" href="/teams/create" class="ml-auto">Add New Team
            </Link>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        teams: Array,
    },
};
</script>
